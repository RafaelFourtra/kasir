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
            $req->file
        }
        $tambah->save();
        return redirect()->back(); 
    }

    public function tampil(){
        $lol = user_order::all();
        return view("userOrder.tambah_menu")->with("lihat",$lol);
    }
}
