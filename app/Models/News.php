<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url', // Pastikan nama kolom ini sama persis dengan yang di migrasi
    ];

    // Jika kamu ingin menonaktifkan mass assignment protection
    // protected $guarded = []; // Ini akan membiarkan semua kolom bisa diisi massal, tidak direkomendasikan untuk produksi

    // Jika nama tabel di DB bukan 'news' (misalnya 'artikel')
    // protected $table = 'artikel';

    // Jika primary key bukan 'id'
    // protected $primaryKey = 'news_id';

    // Jika primary key bukan integer auto-increment
    // public $incrementing = false;

    // Jika tidak menggunakan timestamps created_at dan updated_at
    // public $timestamps = false;
}