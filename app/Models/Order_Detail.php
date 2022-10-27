<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $guarded = [];




public function transaksi()
    {
        return $this->belongsTo(Order::class,"id_transaksi");
    }

public function produk()
    {
        return $this->belongsTo(Produk::class,"id_produk");
    }
}
