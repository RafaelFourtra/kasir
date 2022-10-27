<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_order;

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
        return response()->ajax([

        ]);
    }
    public function hapus($id){
        $table = user_order::find($id);
        $table->delete();
        return redirect()->back();
    }
}
