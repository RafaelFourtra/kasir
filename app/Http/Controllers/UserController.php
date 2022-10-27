<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function Index()
    {
        $user = DB::table("users")->leftJoin("role_user","role_user.user_id","=","users.id")->leftJoin("roles","roles.id","=","role_user.role_id")->select("*","users.name as username")->get();
        return view('user.index',["user"=>$user]);
    }
}