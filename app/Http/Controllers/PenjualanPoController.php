<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiPo;
use App\Models\Order_Detail_Po;
use Carbon\Carbon;

class PenjualanPoController extends Controller
{
    public function home(){
        
    }
    public function index(){
    
        return view('penjualanPo.index');
      
    }

    public function store(Request $request)
    {
        //inisialisasi
   
        $order_detail_po;
        

        
        $result =  DB::transaction(function () use(&$request){
            $transaksi_jumlah=0;

           

            for ($nama_menu = 0; $nama_menu < count($request->nama_menu); $nama_menu++){
            $order_detail_po = new Order_Detail_Po;
            $order_detail_po->id_transaksipo = $id_transaksipo;
            $order_detail_po->nama_menu  = $request->nama_menu[$nama_menu];
            $order_detail_po->jumlah = $request->jumlah[$nama_menu];
            $order_detail_po->harga = $request->harga[$nama_menu];
            $order_detail_po->total_harga = $request->total_harga[$nama_menu];
            $transaksi_jumlah += $request->total_harga[$nama_menu];
            $order_detail_po->save();
            }
            
            $no_po = TransaksiPo::whereDate('transaksi_date', Carbon::today())->count();
            $no_po ++;
            $no_nota_po = date('ymd').str_pad($no_po,3,0,STR_PAD_LEFT);
            $transaksi_po = new TransaksiPo();
            $transaksi_po->namapo = $request->customer_name;
            $transaksi_po->addres = $request->customer_address;
            $transaksi_po->contactpo = $request->customer_contact;
            $transaksi_po->no_nota_po = $no_nota_po;
            $transaksi_po->user_id = auth()->user()->id;
            $transaksi_po->returning_charge = $request->returning_charge;
            $transaksi_po->payment = $request->payment;
            $transaksi_po->payment_method = $request->payment_method;
            $transaksi_po->transaksi_jumlah = $transaksi_jumlah;
            $transaksi_po->transaksi_date = date('Y-m-d');
            $transaksi_po->save();
            $id_transaksipo = $transaksi_po->id;
          
        
            
             
            
        });
        return view("penjualanPo.index",["result" => $result])->with('success', 'Task Created Successfully!');  

      
    }

}
