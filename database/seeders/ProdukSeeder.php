<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Seragam Senin (Putih Abu-abu)', 'kategori' => 'Seragam', 'deskripsi' => 'Seragam resmi hari Senin, kemeja putih dan celana/rok abu-abu sesuai ketentuan sekolah, tersedia berbagai ukuran.', 'gambar' => 'produk-seragam-senin.png'],
            ['nama' => 'Seragam Selasa (Batik Sekolah)', 'kategori' => 'Seragam', 'deskripsi' => 'Seragam batik khas SMK Negeri 4 Kota Bogor untuk hari Selasa, dipadukan dengan celana/rok hitam.', 'gambar' => 'produk-seragam-selasa.png'],
            ['nama' => 'Seragam Pramuka (Rabu)', 'kategori' => 'Seragam', 'deskripsi' => 'Seragam pramuka lengkap warna coklat untuk kegiatan hari Rabu, sesuai standar Kwartir Nasional.', 'gambar' => 'produk-seragam-pramuka.png'],
            ['nama' => 'Seragam Kamis (Kebaya Putih)', 'kategori' => 'Seragam', 'deskripsi' => 'Kebaya putih resmi untuk seragam hari Kamis, dipadukan dengan rok/celana sesuai ketentuan sekolah.', 'gambar' => 'produk-seragam-kamis.png'],
            ['nama' => 'Seragam Jumat (Batik Putih)', 'kategori' => 'Seragam', 'deskripsi' => 'Kemeja batik putih khas sekolah untuk hari Jumat, nyaman digunakan sepanjang hari.', 'gambar' => 'produk-seragam-jumat.png'],
            ['nama' => 'Seragam Olahraga', 'kategori' => 'Seragam', 'deskripsi' => 'Setelan training warna putih-hitam untuk kegiatan olahraga dan ekstrakurikuler.', 'gambar' => 'produk-seragam-olahraga.png'],
            ['nama' => 'Wearpack PPLG', 'kategori' => 'Wearpack', 'deskripsi' => 'Seragam praktik khusus jurusan Pengembangan Perangkat Lunak dan Gim, digunakan saat kegiatan lab dan praktikum.', 'gambar' => 'produk-wearpack-pplg.jpg'],
            ['nama' => 'Wearpack TJKT', 'kategori' => 'Wearpack', 'deskripsi' => 'Seragam praktik khusus jurusan Teknik Jaringan Komputer dan Telekomunikasi untuk kegiatan lab jaringan.', 'gambar' => 'produk-wearpack-tjkt.jpg'],
            ['nama' => 'Wearpack TPFL', 'kategori' => 'Wearpack', 'deskripsi' => 'Seragam praktik khusus jurusan Teknik Pengelasan dan Fabrikasi Logam, dirancang aman untuk kegiatan bengkel.', 'gambar' => 'produk-wearpack-tpfl.jpg'],
            ['nama' => 'Sepatu Safety TPFL', 'kategori' => 'Wearpack', 'deskripsi' => 'Sepatu safety dengan pelindung ujung baja (steel toe), wajib digunakan siswa TPFL saat praktik di bengkel pengelasan.', 'gambar' => 'produk-safety.png'],
            ['nama' => 'Wearpack TKRO', 'kategori' => 'Wearpack', 'deskripsi' => 'Seragam praktik khusus jurusan Teknik Kendaraan Ringan Otomotif untuk kegiatan di bengkel otomotif.', 'gambar' => 'produk-wearpack-tkro.jpg'],
            ['nama' => 'Sepatu Safety TKRO', 'kategori' => 'Wearpack', 'deskripsi' => 'Sepatu safety anti-slip dan tahan oli, wajib digunakan siswa TKRO saat praktik di bengkel otomotif.', 'gambar' => 'produk-safety.png'],
            ['nama' => 'Topi Sekolah', 'kategori' => 'Aksesoris', 'deskripsi' => 'Topi biru resmi dengan lambang SMK Negeri 4 Kota Bogor, digunakan saat upacara dan kegiatan sekolah.', 'gambar' => 'produk-topi.jpg'],
            ['nama' => 'Dasi Sekolah', 'kategori' => 'Aksesoris', 'deskripsi' => 'Dasi biru resmi dengan emblem sekolah, pelengkap seragam hari Senin.', 'gambar' => 'produk-dasi.jpg'],
            ['nama' => 'Sabuk/Ikat Pinggang', 'kategori' => 'Aksesoris', 'deskripsi' => 'Sabuk hitam dengan gesper logo OSIS, bahan berkualitas dan tahan lama.', 'gambar' => 'produk-sabuk.jpg'],
            ['nama' => 'Papan Nama (Name Tag)', 'kategori' => 'Aksesoris', 'deskripsi' => 'Papan nama putih dengan nama siswa, wajib dipakai bersama seragam resmi sekolah.', 'gambar' => 'produk-nametag.jpg'],
        ];

        foreach ($data as $item) {
            Produk::updateOrCreate(
                ['nama' => $item['nama']],
                [
                    'kategori'  => $item['kategori'],
                    'deskripsi' => $item['deskripsi'],
                    'gambar'    => $item['gambar'],
                ]
            );
        }
    }
}