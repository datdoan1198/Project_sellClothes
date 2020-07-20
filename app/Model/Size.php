<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function product()
    {
    	return $this->belongsTo(Product::class,'product_id');
    }
}
