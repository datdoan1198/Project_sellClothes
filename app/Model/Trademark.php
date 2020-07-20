<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    public function products()
    {
    	return $this->hasMany(Product::class,'trademark_id','id');
    }
}
