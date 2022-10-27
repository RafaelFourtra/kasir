<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Order_Detail;

class RiwayatPenjualanController extends Controller
{
    public function index(Request $req){
        $transaksi = Transaksi::withoutGlobalScopes()->with("orderdetail")->whereRaw('Date(transaksi_date) = CURDATE()')->get();
        //dd("ds");
        return view("riwayatPenjualan.index", ["transaksi"=>$transaksi]);
    }

    public function show($id){
        $transaksi = Transaksi::withoutGlobalScopes()->with("orderdetail")->get();
        $detailorder = Order_Detail::where('id_transaksi', $id)->get();
        return view("riwayatPenjualan.index", ["transaksi"=>$transaksi,"detailorder"=>$detailorder]);

    }


    public function print($id){
        $transaksi = Transaksi::withoutGlobalScopes()->with("orderdetail")->get();
        $checking = Transaksi::where("id",$id)->pluck("payment_method")->first();


        if($checking == "Piutang"){
            return redirect()->back();
        }

        $lastIDorder = Transaksi::where("id",$id)->first();
        $order_receipt = Order_Detail::with("produk")->where('id', $id)->get();
        $orderedBy = Transaksi::where('id', $id)->get();

      

        return view("riwayatPenjualan.index", ["transaksi"=>$transaksi, 'order_receipt' => $order_receipt, "orderedBy" => $orderedBy, "lastIDorder" =>   $lastIDorder]);
    }

    public function edit($id){
            $transaksi = Transaksi::withoutGlobalScope()->with("orderdetail")->get();
            $datatrans = Transaksi::all();
            $datatransaksi = Transaksi::find($id);
            return view("riwayatPenjualan.index", ["transaksi"=>$transaksi,"datatrans" => $datatrans, "datatransaksi" => $datatransaksi]);
    
    }

    public function update(Request $request, $id)
    {
        $datatransaksi = Transaksi::find($id)->update($request->all());
        return redirect('riwayatpenjualan')->with('success', 'Task Created Successfully!');
    }

    public function cancel($id){
        //eksekusi
        Transaksi::where("id", $id)->update(["payment_method"=>"cancel"]);

        return redirect()->back();
    }

    public function searchfromDate(Request $req)
    {
        $datefrom = $req->datefrom;
        $dateto = $req->dateto;
    	$transaksi = Transaksi::withoutGlobalScopes()->with("orderdetail")
        ->whereBetween('transaksi_date',[$datefrom,$dateto])
        ->orWhere('transaksi_date', $datefrom)
        ->orWhere('transaksi_date', $dateto)->get();
        return view("riwayatPenjualan.index", ["transaksi" => $transaksi]);
    }
}
