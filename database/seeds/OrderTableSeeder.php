<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('orders')->truncate();
       	DB::table('orders')->insert([
       		['name' => 'Order1'],
       		['name' => 'Order2'],
       	]);
    }
}
