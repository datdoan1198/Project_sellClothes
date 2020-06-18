<?php

use Illuminate\Database\Seeder;

class Order_ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->truncate();
        for($i = 1 ; $i <= 4; $i++ ){
        	DB::table('order_product')->insert([
        		'order_id' => 1,
        		'product_id' => $i,
        	]);
       	}
       	for($i = 1 ; $i <= 4; $i++ ){
        	DB::table('order_product')->insert([
        		'order_id' => 2,
        		'product_id' => $i,
        	]);
       	}
       
    }
}
