<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Pengembangan Website',
                'description' => 'Kami menawarkan jasa pembuatan website profesional dengan desain yang menarik dan responsif. Website yang kami kembangkan dioptimalkan untuk performa dan pengalaman pengguna terbaik.',
                'features' => [
                    'Desain responsif untuk semua perangkat',
                    'Panel admin yang mudah digunakan',
                    'Optimasi SEO dasar',
                    'Integrasi dengan media sosial',
                ],
                'packages' => json_encode([
                    [
                        'name' => 'Paket Dasar',
                        'price' => 1500000,
                        'features' => [
                            'Website 5 Halaman',
                            'Desain Responsif',
                            'Form Kontak',
                            'Gratis Revisi 2x',
                        ]
                    ],
                    [
                        'name' => 'Paket Standar',
                        'price' => 3500000,
                        'popular' => true,
                        'features' => [
                            'Website 10 Halaman',
                            'Desain Premium',
                            'Form Kontak & Booking',
                            'Integrasi Media Sosial',
                            'SEO Dasar',
                            'Gratis Revisi 5x',
                        ]
                    ],
                    [
                        'name' => 'Paket Professional',
                        'price' => 7000000,
                        'features' => [
                            'Website Unlimited Page',
                            'Custom Design',
                            'Sistem Manajemen Konten',
                            'Integrasi Sistem Pembayaran',
                            'SEO Full Package',
                            'Gratis Revisi 10x',
                            'Maintenance 1 Tahun',
                        ]
                    ],
                ]),
            ],
            [
                'name' => 'Penetration Testing',
                'description' => 'Kami menyediakan layanan pengujian penetrasi untuk mengidentifikasi dan mengevaluasi celah keamanan dalam sistem Anda. Dengan metode pengujian terkini, kami membantu memastikan bahwa infrastruktur IT Anda aman dari potensi serangan siber.',
                'features' => [
                    'Pemindaian dan analisis kerentanan',
                    'Pengujian penetrasi pada website dan aplikasi',
                    'Laporan detail dan rekomendasi perbaikan',
                    'Konsultasi keamanan pasca pengujian',
                ],
                'packages' => json_encode([
                    [
                        'name' => 'Paket Dasar',
                        'price' => 2500000,
                        'features' => [
                            'Vulnerability Assessment',
                            'Pemindaian Kerentanan Sistem',
                            'Laporan Dasar',
                            'Rekomendasi Dasar',
                        ]
                    ],
                    [
                        'name' => 'Paket Standar',
                        'price' => 5000000,
                        'popular' => true,
                        'features' => [
                            'Full Penetration Testing',
                            'Analisis Kerentanan Menyeluruh',
                            'Simulasi Serangan',
                            'Laporan Terperinci',
                            'Rekomendasi Perbaikan',
                            'Konsultasi 2 Jam',
                        ]
                    ],
                    [
                        'name' => 'Paket Professional',
                        'price' => 10000000,
                        'features' => [
                            'Full Penetration Testing',
                            'Social Engineering Testing',
                            'Network & Infrastructure Testing',
                            'Physical Security Assessment',
                            'Laporan Lengkap',
                            'Panduan Penanggulangan',
                            'Konsultasi 5 Jam',
                        ]
                    ],
                ]),
            ],
            [
                'name' => 'Desain Grafis',
                'description' => 'Kami siap menciptakan desain visual yang menarik dan sesuai dengan identitas brand Anda. Layanan ini mencakup pembuatan logo, banner, brosur, dan yang lainnya.',
                'features' => [
                    'Desain logo dan identitas brand',
                    'Ilustrasi kustom',
                    'Revisi desain sesuai kebutuhan',
                    'Format file berkualitas tinggi',
                ],
                'packages' => json_encode([
                    [
                        'name' => 'Paket Dasar',
                        'price' => 800000,
                        'features' => [
                            'Logo Dasar',
                            '2 Konsep Desain',
                            'Format File Standard',
                            'Revisi 2x',
                        ]
                    ],
                    [
                        'name' => 'Paket Standar',
                        'price' => 2000000,
                        'popular' => true,
                        'features' => [
                            'Logo Premium',
                            '5 Konsep Desain',
                            'Kartu Nama & Kop Surat',
                            'Format File Lengkap',
                            'Brand Guidelines',
                            'Revisi 5x',
                        ]
                    ],
                    [
                        'name' => 'Paket Professional',
                        'price' => 5000000,
                        'features' => [
                            'Brand Identity Full Package',
                            '8 Konsep Desain',
                            'Stationary Kit Lengkap',
                            'Social Media Kit',
                            'Marketing Materials',
                            'Brand Guidelines Komprehensif',
                            'Revisi Unlimited',
                        ]
                    ],
                ]),
            ]
        ];

        foreach ($services as $serviceData) {
            Service::create([
                'name' => $serviceData['name'],
                'description' => $serviceData['description'],
                'features' => json_encode($serviceData['features']),
                'packages' => $serviceData['packages'],
            ]);
        }
    }
}