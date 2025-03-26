<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'chithu',
            'email' => 'chithresu@gmail.com',
            'password' => Hash::make('admin@123'), // You can customize this
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
