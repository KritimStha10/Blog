<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'status' => 1,
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => null

        ]);

        DB::table('users')->insert([
            'name' => 'News Manager',
            'email' => 'newsmanager@gmail.com',
            'password' => Hash::make('newspassword'),
            'status' => 1,
            'user_type'=> 2,
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => null

        ]);

        DB::table('users')->insert([
            'name' => 'Blog Manager',
            'email' => 'blogmanager@gmail.com',
            'password' => Hash::make('blogpassword'),
            'status' => 1,
            'user_type'=> 3,
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => null

        ]);
    }
}
