<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_order;
use App\Models\riwayat_order;

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
        $riwayat = new riwayat_order();
        $riwayat->harga = $req->harga;
        $riwayat->pembayaran = $req->bayar;
        $riwayat->kembalian = $req->kembalian;
        $riwayat->save();
        return redirect()->back();
    }

    public function riwayat_tampil(){
        $lol = riwayat_order::all
    }
}
