<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CancelScope;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $guarded = [];

 
    public function orderdetail()
    {
        return $this->hasMany(Order_Detail::class,"id_transaksi");
    }

    protected static function booted(){
        static::addGlobalScope(new CancelScope);
    }
}
