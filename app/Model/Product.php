<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){

    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function collection(){
    	return $this->belongsTo(Collection::class,'collection_id','id');
    }
    public function images(){
    	return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
