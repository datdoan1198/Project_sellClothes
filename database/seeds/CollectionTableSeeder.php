<?php

use Illuminate\Database\Seeder;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        	DB::table('collection')->insert([
        		['name' => 'Mùa Xuân'],
        		['name' => 'Mùa Hè'],
        		['name' => 'Mùa Thu'],
        		['name' => 'Mùa Đông'],
        	]);

        
    }
}
