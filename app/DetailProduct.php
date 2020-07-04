<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $guarded = [];
    
    public function product(){
        return $this->hasMany(Product::class,'detail_id','id');
    }
}
