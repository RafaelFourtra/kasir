<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_riwayat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_riwayat';
    protected $primaryKey = 'id';
    protected $guarded = [];

public function user_order()
    {
        return $this->belongsTo(user_order::class,"id_");
    }
}

