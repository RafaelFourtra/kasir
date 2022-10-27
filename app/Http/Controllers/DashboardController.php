<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function Index()
    {
        $user = DB::table("users")->leftJoin("role_user","role_user.user_id","=","users.id")->leftJoin("roles","roles.id","=","role_user.role_id")->select("*","users.name as username")->get();
        return view('admin.dashboard',["user"=>$user]);

        if(Auth::user()->hasRole('admin')){
            return view('admin.dashboard');
        }
        elseif(Auth::user()->hasRole('kasir')){
            return view('admin.dashboard');
        }
        elseif(Auth::user()->hasRole('gudang')){
            return view('gudang.dashboard');
        }
    }

    public function Logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
