<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_riwayat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_riwayat';

    public function ()
    {
        return $this->belongsTo(Cafe::class,"id_cafe");
    }
}
