<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'kode', 'nama', 'slug', 'tagline', 'deskripsi',
        'kompetensi', 'prospek', 'fasilitas', 'mitra',
        'logo', 'gambar_sampul',
    ];

    protected $casts = [
        'deskripsi' => 'array',
        'kompetensi' => 'array',
        'prospek' => 'array',
        'fasilitas' => 'array',
        'mitra' => 'array',
    ];
}