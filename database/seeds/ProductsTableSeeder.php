<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products')->truncate();
    	for ($i = 1 ; $i <= 2 ; $i++){
    		DB::table('products')->insert([
    			'name' => 'sản phẩm 1.' . $i,
    			'category_id' => 1,
    			'collection_id' => 1,
        	]);	
    	}
    	for ($i = 1 ; $i <= 2 ; $i++){
    		DB::table('products')->insert([
    			'name' => 'sản phẩm 2.' . $i,
    			'category_id' => 2,
    			'collection_id' => 2,
        	]);	
    	}
    	for ($i = 1 ; $i <= 2 ; $i++){
    		DB::table('products')->insert([
    			'name' => 'sản phẩm 3.' . $i,
    			'category_id' => 1,
    			'collection_id' => 3,
        	]);	
    	}
    	for ($i = 1 ; $i <= 2 ; $i++){
    		DB::table('products')->insert([
    			'name' => 'sản phẩm 4.' . $i,
    			'category_id' => 2,
    			'collection_id' => 4,
        	]);	
    	}
        
    }
}
