<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Website Paket Basic',
            'description' => 'Website sederhana untuk bisnis kecil',
            'price' => 1500000,
            'is_featured' => true
        ]);

        Product::create([
            'name' => 'Website Paket Premium',
            'description' => 'Website dengan fitur lengkap untuk bisnis menengah',
            'price' => 3500000,
            'is_featured' => true
        ]);

        Product::create([
            'name' => 'Website Paket Enterprise',
            'description' => 'Website custom untuk korporasi',
            'price' => 7000000,
            'is_featured' => false
        ]);
    }
}