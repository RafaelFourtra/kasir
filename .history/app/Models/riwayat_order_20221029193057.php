<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "transaksi_order";
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'menu',
        'jumlah_pesanan',
        'harga',
        'total_harga',
        'no_nota',
    ];
}

