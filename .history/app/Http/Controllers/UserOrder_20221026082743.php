<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_order;

class UserOrder extends Controller
{
    //
    public function tambah(){
        $tambah = new user_order();
        $tambah->menu = $req->menu; 
    }
}
