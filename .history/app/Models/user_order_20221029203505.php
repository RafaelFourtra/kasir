<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "user_order";

    public function detail_riwayat()
    {
        return $this->hasMany('App\Models\Order_Detail');
    }
}
