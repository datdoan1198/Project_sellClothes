<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->trucate();
        DB::table('categories')->insert([
        	[
        		'name' =>'quần',

        	],

        	[
        		'name' => 'áo',
        	]

        ]);
    }
}
