<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Order_Detail;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function home(){
        
    }
    public function index(){
        $produks = Produk::all();
        $orders = Transaksi::all();
        $lastID = Order_Detail::max('id_transaksi');
        $lastIDorder = Transaksi::orderBy("id", 'desc')->first();
        $order_receipt = Order_Detail::with("produk")->where('id_transaksi', $lastID)->get();
        $orderedBy = Transaksi::where('id', $lastID)->get();

        return view('penjualan.order', ['produks' => $produks, 'orders' => $orders, 
        'order_receipt' => $order_receipt, "orderedBy" => $orderedBy, "lastIDorder" =>   $lastIDorder]);
      
    }

    public function store(Request $request)
    {
        //inisialisasi
        $produks;
        $order_detail;
        

        
        $result =  DB::transaction(function () use(&$request){
            $transaksi_jumlah=0;
            $no = Transaksi::whereDate('transaksi_date', Carbon::today())->count();
            $no ++;
            $no_nota = date('ymd').str_pad($no,3,0,STR_PAD_LEFT);
            $transaksi = new Transaksi();
            $transaksi->nama = $request->customer_name;
            $transaksi->contact = $request->customer_contact;
            $transaksi->no_nota = $no_nota;
            $transaksi->user_id = auth()->user()->id;
            $transaksi->returning_charge = $request->returning_charge;
            $transaksi->payment = $request->payment;
            $transaksi->payment_method = $request->payment_method;
            $transaksi->transaksi_jumlah = $transaksi_jumlah;
            $transaksi->transaksi_date = date('Y-m-d');
            $transaksi->save();
            $id_transaksi = $transaksi->id;

            for ($id_produk = 0; $id_produk < count($request->id_produk); $id_produk++){
            $order_detail = new Order_Detail;
            $order_detail->id_transaksi = $id_transaksi;
            $order_detail->id_produk = $request->id_produk[$id_produk];
            $order_detail->jumlah = $request->jumlah[$id_produk];
            $order_detail->harga = $request->harga[$id_produk];
            $order_detail->total_harga = $request->total_harga[$id_produk];
            $transaksi_jumlah +=$request->total_harga[$id_produk];
            $order_detail->save();
            }
            
            

            $produks = Produk::all();   
            $order_detail = Order_Detail::where('id_transaksi', $id_transaksi)->get();
            $orderedBy = Transaksi::where('id')->get();
            $lastIDorder = Transaksi::orderBy("id", 'desc')->first();


            return [
                'produks' => $produks,
                'order_receipt' => $order_detail,
                'orderedBy' => $orderedBy,
                'lastIDorder' => $lastIDorder,
                
            ];
            
        });

        return view("penjualan.order", $result )->with('success', 'Task Created Successfully!');   
    }

    public function search(Request $request){
        $kw = $request->kw;
        $produk = Produk::whereHas('kategori', function ($query) use($kw) {
            return $query->where('nama_kategori', 'LIKE', "%".$kw."%");
        })->orWhere("nama_produk","LIKE","%".$kw."%")->get();

        return json_encode(["produk"=>$produk]);
    }

}
