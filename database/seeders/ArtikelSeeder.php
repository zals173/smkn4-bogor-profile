<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        Artikel::create([
            'judul' => 'Juara 3 dalam Lomba Kompetensi Siswa (LKS)',
            'slug' => 'juara-3-lomba-kompetensi-siswa',
            'kategori' => 'Prestasi',
            'gambar' => 'artikel-1.jpeg',
            'ringkasan' => 'Selamat dan sukses kepada Novandra Aria atas prestasi luar biasa berhasil meraih Juara 3 dalam Lomba Kompetensi Siswa (LKS) Tingkat Provinsi Jawa Barat pada Bidang Keahlian Cloud Computing.',
            'isi' => '<p>Selamat dan sukses kepada Novandra Aria atas prestasi luar biasa berhasil meraih Juara 3 dalam Lomba Kompetensi Siswa (LKS) Tingkat Provinsi Jawa Barat pada Bidang Keahlian Cloud Computing.</p><p>Prestasi ini merupakan hasil kerja keras dan latihan intensif yang dilakukan bersama pembimbing sekolah selama beberapa bulan terakhir. SMK Negeri 4 Kota Bogor terus mendorong siswa-siswinya untuk aktif berkompetisi di berbagai ajang, baik tingkat kota, provinsi, maupun nasional.</p><p>Kepala sekolah menyampaikan apresiasi tinggi atas pencapaian ini dan berharap dapat memotivasi siswa lain untuk terus mengembangkan potensi diri di bidang teknologi.</p>',
            'status' => 'publish',
            'views' => 950,
            'likes' => 62,
        ]);

        Artikel::create([
            'judul' => 'KR4BAT Mengaji',
            'slug' => 'kr4bat-mengaji',
            'kategori' => 'Kegiatan',
            'gambar' => 'artikel-2.jpeg',
            'ringkasan' => 'Kegiatan KR4BAT Mengaji rutin digelar setiap pekan sebagai wujud pembinaan karakter dan spiritualitas siswa SMK Negeri 4 Bogor, sejalan dengan nilai "Kejuruan 4 Hebat" yang dijunjung sekolah.',
            'isi' => '<p>Kegiatan KR4BAT Mengaji rutin digelar setiap pekan sebagai wujud pembinaan karakter dan spiritualitas siswa SMK Negeri 4 Bogor, sejalan dengan nilai "Kejuruan 4 Hebat" yang dijunjung sekolah.</p><p>Program ini bertujuan untuk menyeimbangkan pendidikan vokasi dengan pembinaan akhlak dan keimanan siswa, sesuai dengan misi sekolah dalam meningkatkan keimanan dan ketakwaan seluruh warga sekolah.</p><p>Kegiatan ini diikuti oleh seluruh siswa secara bergiliran dan didampingi oleh guru pembina keagamaan sekolah.</p>',
            'status' => 'publish',
            'views' => 250,
            'likes' => 170,
        ]);

        Artikel::create([
            'judul' => 'Larangan Aktivitas Penjualan Seragam Sekolah',
            'slug' => 'larangan-aktivitas-penjualan-seragam-sekolah',
            'kategori' => 'Pengumuman',
            'gambar' => 'artikel-3.jpg',
            'ringkasan' => 'Menindaklanjuti Surat Kepala Dinas Pendidikan Provinsi Jawa Barat No. 16739/PW.03/SEKRE, SMKN 4 Bogor menegaskan larangan pengarahan pengadaan seragam oleh pendidik serta menjamin kebebasan orang tua/wali dalam pengadaan seragam sekolah.',
            'isi' => '<p>Menindaklanjuti Surat Kepala Dinas Pendidikan Provinsi Jawa Barat No. 16739/PW.03/SEKRE, SMKN 4 Bogor menegaskan larangan pengarahan pengadaan seragam oleh pendidik serta menjamin kebebasan orang tua/wali dalam pengadaan seragam sekolah.</p><p>Sekolah menegaskan bahwa orang tua/wali siswa bebas membeli perlengkapan seragam di mana pun, tanpa ada paksaan atau arahan khusus dari pihak sekolah maupun oknum tertentu.</p><p>Kebijakan ini diambil untuk melindungi hak orang tua/wali siswa dan menciptakan transparansi dalam pengadaan kebutuhan sekolah.</p>',
            'status' => 'publish',
            'views' => 890,
            'likes' => 170,
        ]);
    }
}