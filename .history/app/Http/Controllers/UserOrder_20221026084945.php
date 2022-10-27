<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_order;

class UserOrder extends Controller
{
    //
    public function tambah(Request $req){
        $tambah = user_order::create($req->all());
        if($req->hasFile('gambar')){
            $req->file('gambar')->move('uploads/menu',$req->file('gambar')->getClientOriginalName());
            $tambah->gambar = $req->file('gambar')->getClientOriginalName();
            $tambah->save();
        }
        return redirect()->back(); 
    }

    public function tampil(){
        $lol = user_order::all();
        return view("userOrder.tambah_menu")->with("lihat",$lol);
    }
}
