<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['gambar' => 'galeri-1.jpg', 'kategori' => 'Fasilitas', 'judul' => 'Gedung Utama'],
            ['gambar' => 'galeri-2.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Upacara Bendera Hari Senin'],
            ['gambar' => 'galeri-3.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Sertifikasi TOEIC'],
            ['gambar' => 'galeri-4.jpg', 'kategori' => 'Prestasi', 'judul' => 'Juara 1 IOFEST bidang UI/UX di Universitas Tarumanegara'],
            ['gambar' => 'galeri-5.jpg', 'kategori' => 'Kegiatan', 'judul' => 'KR4BAT Mengaji'],
            ['gambar' => 'galeri-6.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Tes Psikologi'],
            ['gambar' => 'galeri-7.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Kokurikuler Rabu Sehat'],
            ['gambar' => 'galeri-8.jpg', 'kategori' => 'Fasilitas', 'judul' => 'Lab TJKT'],
            ['gambar' => 'galeri-9.jpg', 'kategori' => 'Prestasi', 'judul' => 'Penyerahan Hadiah Kepada Juara Lomba'],
            ['gambar' => 'galeri-10.jpg', 'kategori' => 'Prestasi', 'judul' => 'Juara 3 Lomba Futsal'],
            ['gambar' => 'galeri-11.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Dhuha Bersama'],
            ['gambar' => 'galeri-12.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Penyuluhan & Bimbingan Jabatan'],
            ['gambar' => 'galeri-13.jpg', 'kategori' => 'Fasilitas', 'judul' => 'Bengkel Otomotif'],
            ['gambar' => 'galeri-14.jpg', 'kategori' => 'Fasilitas', 'judul' => 'Lab PPLG'],
            ['gambar' => 'galeri-15.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Verifikasi Data Kelas XII'],
            ['gambar' => 'galeri-16.jpg', 'kategori' => 'Kegiatan', 'judul' => 'Rabu Ekologi'],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}