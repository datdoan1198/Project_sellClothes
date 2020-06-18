<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
    	return $this->belongsToMany(Product::class,'order_product');
    }
}
