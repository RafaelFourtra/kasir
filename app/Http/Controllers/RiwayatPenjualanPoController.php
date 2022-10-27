<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPo;
use App\Models\Order_Detail_Po;

class RiwayatPenjualanPoController extends Controller
{
    public function index(Request $req){
        $transaksipo = TransaksiPo::withoutGlobalScopes()->with("orderdetailpo")->whereRaw('Date(transaksi_date) = CURDATE()')->get();

        return view("riwayatPenjualanPo.index", ["transaksipo"=>$transaksipo]);
    }

    public function show($id){
        $transaksipo = TransaksiPo::withoutGlobalScopes()->with("orderdetailpo")->get();
        $detailorder = Order_Detail_Po::where('id_transaksipo', $id)->get();
        return view("riwayatPenjualanPo.index", ["transaksipo"=>$transaksipo,"detailorder"=>$detailorder]);

        // return view("riwayatPenjualanPo.index");
    }

    public function print($id){
        $transaksipo = TransaksiPo::withoutGlobalScopes()->with("orderdetailpo")->get();
        $checking = TransaksiPo::where("id",$id)->pluck("payment_method")->first();


        if($checking == "Piutang"){
            return redirect()->back();
        }

        $lastIDorder = TransaksiPo::withoutGlobalScopes()->where("id",$id)->first();
        $order_receipt = Order_Detail_Po::with("transaksipo")->where('id_transaksipo', $id)->get();
        $orderedBy = Transaksipo::where('id', $id)->get();

      

        return view("riwayatPenjualanPo.index", ["transaksipo"=>$transaksipo, 'order_receipt' => $order_receipt, "orderedBy" => $orderedBy, "lastIDorder" =>   $lastIDorder]);
    }

    public function edit($id){
        $transaksipo = TransaksiPo::with("orderdetailpo")->get();
        $datatrans = TransaksiPo::all();
        $datatransaksi = TransaksiPo::find($id);
        return view("riwayatPenjualanpo.index", ["transaksipo"=>$transaksipo,"datatrans" => $datatrans, "datatransaksi" => $datatransaksi]);

    }

    public function update(Request $request, $id)
    {
        $datatransaksi = TransaksiPo::find($id)->update($request->all());
        return redirect('riwayatpenjualanpo')->with('success', 'Task Created Successfully!');
    }

    public function cancelpo($id){
        //eksekusi
        TransaksiPo::where("id",$id)->update(["payment_method"=>"cancel"]);
        return redirect("/riwayatpenjualanpo");
    }
    
    public function searchfromDatePo(Request $req)
    {
        $datefrom = $req->datefrom;
        $dateto = $req->dateto;
    	$transaksipo = TransaksiPo::withoutGlobalScopes()->with("orderdetailpo")
        ->whereBetween('transaksi_date',[$datefrom,$dateto])
        ->orWhere('transaksi_date', $datefrom)
        ->orWhere('transaksi_date', $dateto)->get();
        return view("riwayatPenjualanpo.index", ["transaksipo" => $transaksipo]);
    }

}
