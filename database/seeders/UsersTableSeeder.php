<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

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

            // Admin
            [
                'name' => 'admin', 
                'username' => 'admin', 
                'email' => 'admin@mail.com', 
                'password' => Hash::make('111'), 
                'role' => 'admin', 
                'status' => 'active', 
            ],

            // Vendor
            [
                'name' => 'vendor', 
                'username' => 'vendor', 
                'email' => 'vendor@mail.com', 
                'password' => Hash::make('111'), 
                'role' => 'vendor', 
                'status' => 'active', 
            ],

            // User or Customer
            [
                'name' => 'customer', 
                'username' => 'customer', 
                'email' => 'customer@mail.com', 
                'password' => Hash::make('111'), 
                'role' => 'customer', 
                'status' => 'active', 
            ],
        ]);
    }
}
