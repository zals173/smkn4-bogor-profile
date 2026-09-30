<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        Jurusan::create([
            'kode' => 'PPLG',
            'nama' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
            'slug' => 'pplg',
            'tagline' => 'Membangun aplikasi dan game masa depan',
            'deskripsi' => [
                'Jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) dirancang untuk mencetak tenaga profesional di bidang rekayasa perangkat lunak dan pengembangan permainan interaktif. Kurikulum kami disusun berkolaborasi dengan industri teknologi terkemuka untuk memastikan lulusan memiliki keterampilan teknis yang relevan dengan kebutuhan pasar global.',
                'Siswa akan mempelajari siklus lengkap pengembangan perangkat lunak (SDLC), mulai dari analisis kebutuhan, perancangan antarmuka (UI/UX), pengkodean menggunakan berbagai bahasa pemrograman modern, hingga pengujian dan penerapan aplikasi berbasis web, mobile, dan desktop.',
            ],
            'kompetensi' => ['Pemrograman Web', 'Pemrograman Mobile', 'Pengembangan Game', 'UI/UX Design'],
            'prospek' => ['Web Developer', 'Mobile Developer', 'Game Developer', 'QA Tester', 'UI/UX Designer'],
            'fasilitas' => [
                ['badge' => 'LAB', 'judul' => 'Lab Pemrograman', 'deskripsi' => 'Dilengkapi dengan spesifikasi komputer tinggi (Core i7/Ryzen 7, RAM 16GB) untuk mendukung proses kompilasi aplikasi kompleks dengan lancar.', 'gambar' => 'jurusan-pplg.jpg'],
            ],
            'mitra' => [
                ['nama' => 'PT Bonet Utama', 'logo' => 'mitra-bonet.png'],
            ],
            'logo' => 'logo-pplg.png',
            'gambar_sampul' => 'jurusan-pplg.jpg',
        ]);

        Jurusan::create([
            'kode' => 'TJKT',
            'nama' => 'Teknik Jaringan Komputer dan Telekomunikasi (TJKT)',
            'slug' => 'tjkt',
            'tagline' => 'Menghubungkan dunia lewat jaringan yang andal',
            'deskripsi' => [
                'Jurusan Teknik Jaringan Komputer dan Telekomunikasi (TJKT) dirancang untuk mencetak tenaga profesional yang kompeten di bidang jaringan komputer, infrastruktur teknologi informasi, dan sistem telekomunikasi. Kurikulum kami disusun untuk membekali siswa dengan keterampilan teknis yang relevan dengan perkembangan teknologi serta kebutuhan industri digital yang terus berkembang.',
                'Siswa akan mempelajari berbagai aspek teknologi jaringan, mulai dari perakitan dan konfigurasi perangkat komputer, instalasi dan administrasi jaringan, pengelolaan server, keamanan jaringan, hingga sistem komunikasi dan telekomunikasi. Pembelajaran juga mencakup praktik membangun dan mengelola jaringan berbasis LAN, WAN, maupun teknologi jaringan modern lainnya.',
            ],
            'kompetensi' => ['Instalasi Jaringan LAN/WAN', 'Konfigurasi Router & Switch', 'Keamanan Jaringan', 'Administrasi Server', 'Instalasi Fiber Optik'],
            'prospek' => ['Network Engineer', 'Network Administrator', 'IT Support Specialist', 'System Administrator', 'Technical Support'],
            'fasilitas' => [
                ['badge' => 'LAB', 'judul' => 'Lab Jaringan', 'deskripsi' => 'Dilengkapi perangkat router dan switch standar industri (Cisco/Mikrotik) untuk praktik konfigurasi jaringan secara langsung.', 'gambar' => 'jurusan-tjkt.jpg'],
            ],
            'mitra' => [
                ['nama' => 'PT Bonet Utama', 'logo' => 'mitra-bonet.png'],
            ],
            'logo' => 'logo-tjkt.png',
            'gambar_sampul' => 'jurusan-tjkt.jpg',
        ]);

        Jurusan::create([
            'kode' => 'TPFL',
            'nama' => 'Teknik Pengelasan dan Fabrikasi Logam (TPFL)',
            'slug' => 'tpfl',
            'tagline' => 'Presisi dalam setiap sambungan logam',
            'deskripsi' => [
                'Jurusan Teknik Pengelasan dan Fabrikasi Logam (TPFL) dirancang untuk mencetak tenaga profesional di bidang pengelasan dan fabrikasi logam. Kurikulum kami membekali siswa dengan keterampilan teknis yang relevan dengan kebutuhan industri manufaktur dan konstruksi.',
                'Siswa akan mempelajari berbagai teknik pengelasan, mulai dari persiapan material, penggunaan peralatan las, teknik pengelasan berbagai posisi, hingga pemeriksaan dan pengujian hasil pengelasan. Pembelajaran juga mencakup proses fabrikasi logam, keselamatan kerja, serta penerapan standar industri.',
            ],
            'kompetensi' => ['Teknik Pengelasan SMAW/GMAW', 'Fabrikasi Logam', 'Pembacaan Gambar Teknik', 'Pengoperasian Mesin CNC', 'Keselamatan Kerja (K3)'],
            'prospek' => ['Welder Profesional', 'Teknisi Fabrikasi', 'Quality Control Inspector', 'Operator Mesin CNC', 'Supervisor Produksi'],
            'fasilitas' => [
                ['badge' => 'LAB', 'judul' => 'Bengkel Pengelasan', 'deskripsi' => 'Dilengkapi mesin las standar industri dan area kerja aman sesuai standar K3 untuk praktik pengelasan langsung.', 'gambar' => 'jurusan-tpfl.jpg'],
            ],
            'mitra' => [
                ['nama' => 'PT Komatsu Undercarriage Indonesia', 'logo' => 'mitra-komatsu.png'],
            ],
            'logo' => 'logo-tpfl.png',
            'gambar_sampul' => 'jurusan-tpfl.jpg',
        ]);

        Jurusan::create([
            'kode' => 'TKRO',
            'nama' => 'Teknik Kendaraan Ringan Otomotif (TKRO)',
            'slug' => 'tkro',
            'tagline' => 'Ahli teknologi otomotif masa kini',
            'deskripsi' => [
                'Jurusan Teknik Otomotif (TO) dirancang untuk mencetak tenaga profesional di bidang perawatan dan perbaikan kendaraan bermotor. Kurikulum kami membekali siswa dengan keterampilan teknis yang relevan dengan perkembangan teknologi otomotif dan kebutuhan industri.',
                'Siswa akan mempelajari berbagai sistem kendaraan, mulai dari mesin, sistem kelistrikan, sistem pemindah tenaga, sistem rem, sistem kemudi, hingga perawatan dan perbaikan kendaraan. Pembelajaran dilakukan melalui teori dan praktik untuk membangun kemampuan diagnosis, servis, serta perbaikan kendaraan sesuai standar industri.',
            ],
            'kompetensi' => ['Perawatan Mesin Kendaraan', 'Sistem Kelistrikan Otomotif', 'Diagnostik Kendaraan (Scanner)', 'Sistem Kemudi & Suspensi', 'Overhaul Mesin'],
            'prospek' => ['Teknisi Otomotif', 'Service Advisor', 'Mekanik Bengkel Resmi', 'Quality Control Otomotif', 'Wirausaha Bengkel'],
            'fasilitas' => [
                ['badge' => 'LAB', 'judul' => 'Bengkel Otomotif', 'deskripsi' => 'Dilengkapi unit kendaraan praktik dan peralatan standar bengkel resmi untuk pembelajaran perawatan kendaraan langsung.', 'gambar' => 'jurusan-tkro.jpg'],
            ],
            'mitra' => [
                ['nama' => 'PT Astra Honda Motor', 'logo' => 'mitra-honda.png'],
            ],
            'logo' => 'logo-tkro.png',
            'gambar_sampul' => 'jurusan-tkro.jpg',
        ]);
    }
}