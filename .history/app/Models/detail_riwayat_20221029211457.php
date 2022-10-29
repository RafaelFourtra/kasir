<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_riwayat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_riwayat';

   
    public function riwayat_order()
    {
        return $this->belongsTo(riwayat_order::class,"id_transaksi_order");
    }

public function user_order()
    {
        return $this->belongsTo(user_order::class,"id");
    }

    public function menus()
    {
        return $this->belongsTo(user_order::class,"id");
    }
}

