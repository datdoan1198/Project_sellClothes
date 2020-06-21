<?php

use Illuminate\Database\Seeder;

class UsersTablleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'name',
            'email' => 'datdoan123@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1,
        ]);
    }
}
