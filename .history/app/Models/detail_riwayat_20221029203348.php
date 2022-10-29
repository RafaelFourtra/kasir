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
        return $this->belongsTo(riwayat_order::class,"id_transaksi");
    }

public function user_order()
    {
        return $this->belongsTo(Produk::class,"id_menu");
    }
}

