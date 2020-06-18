<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	protected $table = 'images';
    public function product(){
    	return $this->belongsTo(Product::class,'product_id');
    }
}
