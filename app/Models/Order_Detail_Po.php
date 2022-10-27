<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail_Po extends Model
{
    protected $table = 'order_detail_po';
    protected $primaryKey = 'id';
    protected $guarded = [];



    public function transaksipo()
    {
        return $this->belongsTo(TransaksiPo::class,"id_transaksipo");
    }

}