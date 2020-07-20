<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
    	return $this->belongsToMany(Product::class,'order_product');
    }
    public function order_products(){
    	return $this->hasMany(Order_Product::class,'order_id','id');
    }
}
