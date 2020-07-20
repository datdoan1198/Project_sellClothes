<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function products(){
    	return $this->hasMany(Product::class,'category_id','id');
    }
    public function showCategory($categories,$parent_id = 0,$level = 0)
    {
    	$cate_child = array();
    	foreach ($categories as $category) {
    		if ($category->parent_id == $parent_id) {
                    $cate_child[$category->name] = $category;
                    $data = new Category(); 
                    $children = $data->showCategory($categories,$category['id']);
                    $cate_child = array_merge($cate_child,$children);
                          
                }
    	}
        return $cate_child ;   	
    	
    }
}
