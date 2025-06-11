<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::truncate();

        $newsData = [
            [
                'title' => 'Tempat Nyaman Samping Kolam',
                'description' => 'Masuk ke Dugg Coffee dan temukan lebih dari sekadar secangkir kopi. Area semi-outdoor kami menghadirkan kolam ikan yang menenangkan, menciptakan suasana yang sempurna untuk bersantai, bekerja, atau berkumpul dengan teman. Nikmati hidangan lezat dan minuman segar kami sambil menikmati pemandangan yang asri dan suara gemericik air. Dugg Coffee adalah tempat ideal bagi Anda yang mencari ketenangan di tengah hiruk pikuk kota.',
                'image_name' => '1748866991.png',
                'date' => '02 Jun 2025',
            ],
            [
                'title' => 'Dugg Cofee: Tekken 8 Tournament',
                'description' => 'Kompetisi Tekken 8 pertama di Dugg Coffee! Gabungkan semangat gaming dan kopi dalam turnamen seru ini. Terbuka untuk semua level pemain, dari pemula hingga pro. Dapatkan kesempatan memenangkan hadiah menarik dan tunjukkan keahlianmu di arena virtual. Segera daftar dan jadilah legenda Tekken berikutnya di Dugg Coffee!',
                'image_name' => '1748866833.jpg',
                'date' => '02 Jun 2025',
            ],
            [
                'title' => 'Nobar Kualifikasi Piala Dunia',
                'description' => 'Nobar eksklusif Kualifikasi Piala Dunia 2026 bareng komunitas pecinta bola. Tempat terbatas, daftar sekarang dan dukung tim favoritmu di layar lebar kami. Rasakan atmosfer pertandingan yang seru sambil menikmati kopi dan camilan favoritmu. Jangan lewatkan momen-momen menegangkan dan rayakan setiap gol bersama kami di Dugg Coffee!',
                'image_name' => '1748866801.jpg',
                'date' => '02 Jun 2025',
            ],
            [
                'title' => 'Ngopi & Nongkrong: Evolusi Tempat Ngopi di Era Digital',
                'description' => 'Di tengah perkembangan teknologi dan perubahan gaya hidup masyarakat urban, cara orang menikmati kopi pun ikut berevolusi. Ngopi tidak lagi sebatas aktivitas pribadi atau sekadar melepas lelah, melainkan sudah menjadi bagian dari kehidupan sosial dan profesional. Banyak orang kini memilih coffee shop sebagai tempat untuk menyelesaikan pekerjaan, berdiskusi, hingga membangun relasi. Tren ini menciptakan peluang baru bagi industri kafe untuk menghadirkan tempat ngopi yang bukan hanya enak kopinya, tetapi juga nyaman dan multifungsi.',
                'image_name' => '1748866751.jpg',
                'date' => '02 Jun 2025',
            ],
        ];

        foreach ($newsData as $data) {
            News::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'content' => $data['description'],
                'image_url' => 'img/news-img/' . $data['image_name'],
                'created_at' => Carbon::parse($data['date'])->startOfDay(),
                'updated_at' => Carbon::parse($data['date'])->startOfDay(),
            ]);
        }
    }
}
