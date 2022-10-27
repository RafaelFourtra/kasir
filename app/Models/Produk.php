<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,"id_kategori");
    }

    public function orderdetail()
    {
        return $this->hasMany('App\Models\Order_Detail');
    }

}   
