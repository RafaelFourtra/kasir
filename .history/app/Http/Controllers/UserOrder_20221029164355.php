<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_order;
use App\Models\riwayat_order;
use Carbon\Carbon;
use App\Models\detail_riwayat;
use Illuminate\Support\Facades\DB;

class UserOrder extends Controller
{
    //
    public function tambah(Request $req){
        $tambah = new user_order();
        $tambah->menu = $req->menu;
        $tambah->harga = $req->harga;
        if($req->hasFile('gambar')){
            $file = $req->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/menu/',$filename);
            $tambah->gambar = $filename;
        }
        $tambah->save();
        return redirect()->back(); 
    }

    public function tampil(){
        $lol = user_order::all();
        return view("userOrder.tambah_menu")->with("lihat",$lol);
    }

    public function edit($id){
        $see = user_order::find($id);
        return response()->json([
            "status"=>200,
            "data"=>$see,
        ]);
    }

    public function update(Request $req){
        $id_data = $req->id;
        $ubah = user_order::find($id_data);
        $ubah->menu = $req->menu;
        $ubah->harga = $req->harga;
        if($req->hasFile('gambar')){
            $file = $req->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/menu/',$filename);
            $ubah->gambar = $filename;
        }
        $ubah->update();
        return redirect()->back(); 
    }

    public function hapus($id){
        $table = user_order::find($id);
        $table->delete();
        return redirect()->back();
    }

    public function lihat_menu(){
        $menu = user_order::all();
        return view('userOrder.lihat_menu')->with("menu",$menu);
    }

    public function riwayat_order(Request $req){
        $transaksi_jumlah = 0;

        $data = $req->all();
        $transaksi = new riwayat_order();
        $no_po = riwayat_order::whereDate('tanggal', Carbon::today())->count();
        $no_po++;
        $no_nota_po = date('ymd') . str_pad($no_po, 3, 0, STR_PAD_LEFT);
        $transaksi->no_nota = $no_nota_po;
        $transaksi->tanggal = $data['tanggal'];
       

        for ($id_menu = 0; $id_menu < count($req->id_menu); $id_menu++){
        $transaksi_jumlah += $req->total[$id_menu];
        $detail_trans = new detail_riwayat;
        $detail_trans->id_menu = $req->id_menu[$id_menu];
        $detail_trans->harga = $req->total[$id_menu];
        $detail_trans->kwantitas = $req->jumlah[$id_menu];
        $detail_trans->kwantitas = $req->jumlah[$id_menu];
        $transaksi->total_transaksi = $transaksi_jumlah; //Jumlah Transaksi
        $transaksi->save();
        $detail_trans->id_transaksi_order = $transaksi->id;
        $detail_trans->save();
        }

        return redirect()->back();
    }

    public function riwayat_tampil(){
        $lol = riwayat_order::all();
        return view("userOrder.riwayat_user")->with("lihat",$lol);
    }
}
