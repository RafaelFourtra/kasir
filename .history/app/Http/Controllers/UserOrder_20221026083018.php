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
        if($tambah)
        $tambah->save();
        return redirect()->back(); 
    }
}
