<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function detail_product(){
        return $this->belongsTo(DetailProduct::class,'detail_id','id');
    }
}
