<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $table = 'collection';
    public function products(){
    	return $this->hasMany(Product::class,'collection_id','id');
    }
}
