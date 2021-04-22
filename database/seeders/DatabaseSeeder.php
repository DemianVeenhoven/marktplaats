<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'TesT',
            'email' => 'Test@gmail.com',
            'password' => 'Test1234'
        ]);

        DB::table('ads')->insert([
            'seller' => 'TesT',
            'title' => 'Test1',
            'body' => 'Test1',
        ]);
    }
}
