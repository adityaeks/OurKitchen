<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the 'products' table is empty
        if (DB::table('products')->count() === 0) {
            // Seeder sesuai dengan foto yang ada di storage/public/images
            DB::table('products')->insert([
                'name' => 'Madu Hutan',
                'size' => 1000,
                'price' => 100000,
                'image' => '1691025436.png',
            ]);
            DB::table('products')->insert([
                'name' => 'Madu Multifora',
                'size' => 500,
                'price' => 75000,
                'image' => '1691025532.png',
            ]);
        }
    }
}
