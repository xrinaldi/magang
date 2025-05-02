<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'name' => 'Pengembangan Website',
            'description' => 'Jasa pembuatan website profesional dengan desain yang menarik dan responsif.',
            'price' => 2500000,
            'is_featured' => true
        ]);

        Service::create([
            'name' => 'Penetration Testing',
            'description' => 'Layanan pengujian penetrasi untuk mengidentifikasi dan mengevaluasi celah keamanan dalam sistem Anda.',
            'price' => 5000000,
            'is_featured' => true
        ]);

        Service::create([
            'name' => 'Desain Grafis',
            'description' => 'Layanan desain visual yang menarik dan sesuai dengan identitas brand Anda.',
            'price' => 2000000,
            'is_featured' => true
        ]);
    }
}