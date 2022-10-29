<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_order;
use App\Models\riwayat_order;
use Carbon\Carbon;

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
        for ($id_menu = 0; $id_menu < count($req->id_menu); $id_menu++){
        $riwayat = new riwayat_order;
        $riwayat->menu = $req->menu[$id_menu];
        $riwayat->jumlah_pesanan = $req->jumlah_pesanan;
        $riwayat->harga = $req->harga;
        $riwayat->total_harga = $req->total;
        $no_po = riwayat_order::whereDate('tanggal', Carbon::today())->count();
        $no_po++;
        $no_nota_po = date('ymd') . str_pad($no_po, 3, 0, STR_PAD_LEFT);
        $riwayat->no_nota = $no_nota_po;
        $riwayat->save();
        return redirect()->back();
        }
    }

    public function riwayat_tampil(){
        $lol = riwayat_order::all();
        return view("userOrder.riwayat_user")->with("lihat",$lol);
    }
}
