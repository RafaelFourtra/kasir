<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CancelScope;

class TransaksiPo extends Model
{
    protected $table = 'transaksipo';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function orderdetailpo()
    {
        return $this->hasMany(Order_Detail_Po::class,"id_transaksipo");
    }

    protected static function booted(){
        static::addGlobalScope(new CancelScope);
    }

}
