<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title' => '10 Tips Meningkatkan Keamanan Website Anda',
            'content' => 'Artikel tentang cara meningkatkan keamanan website...',
            'author' => 'Admin',
            'publish_date' => now()
        ]);

        Article::create([
            'title' => 'Tren Desain Website yang Akan Populer di 2025',
            'content' => 'Artikel tentang tren desain website terbaru...',
            'author' => 'Admin',
            'publish_date' => now()->subDays(5)
        ]);

        Article::create([
            'title' => 'Strategi Digital Marketing untuk UMKM di Era 2025',
            'content' => 'Artikel tentang strategi digital marketing...',
            'author' => 'Admin',
            'publish_date' => now()->subDays(10)
        ]);
    }
}