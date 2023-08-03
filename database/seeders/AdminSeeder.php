<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan user admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'), // Ganti 'password' dengan kata sandi yang Anda inginkan
        ]);

        // Tambahkan user lain (jika diperlukan)
        // DB::table('users')->insert([
        //     'name' => 'User Lain',
        //     'email' => 'user@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        // Tambahkan lebih banyak user jika diperlukan
    }
}
