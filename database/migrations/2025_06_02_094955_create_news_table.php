<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // Kolom ID utama (auto-incrementing primary key)
            $table->string('title'); // Kolom untuk judul berita, tipe string
            $table->string('slug')->unique(); // Kolom untuk slug URL, tipe string, harus UNIK
            $table->text('content'); // Kolom untuk isi berita, tipe text (untuk teks panjang)
            $table->string('image_url')->nullable(); // Kolom untuk URL gambar, tipe string, boleh NULL (kosong)
            $table->timestamps(); // Kolom created_at dan updated_at (otomatis ditambahkan Laravel)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
