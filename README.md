# Website Company Profile — SMK Negeri 4 Kota Bogor

Website profil sekolah dinamis untuk SMK Negeri 4 Kota Bogor, dibangun sebagai proyek Uji Kompetensi Keahlian (UKK) Pengembangan Perangkat Lunak dan Gim (PPLG).

## Tech Stack

- **Backend**: Laravel 12, PHP 8.2
- **Database**: MySQL
- **Frontend**: Tailwind CSS v4 (via Vite), Blade Templating
- **Editor**: TinyMCE (rich text editor untuk artikel)
- **Font**: Poppins (Google Fonts)

## Fitur

### Sisi Publik
- Beranda dengan hero, statistik, dan preview konten
- Tentang sekolah: profil, visi-misi, ekstrakurikuler
- Jurusan: daftar dan detail tiap program keahlian
- Artikel & berita: daftar, detail, sistem like dan tayangan
- Galeri foto: filter kategori, pencarian, lightbox
- Produk sekolah: seragam, wearpack, aksesoris
- Navigasi mobile responsif

### Sisi Admin (`/admin`)
- Autentikasi admin dengan "ingat saya"
- Dashboard dengan statistik, grafik tren, dan aktivitas terbaru
- CRUD (Create, Read, Update, Delete) untuk Jurusan, Artikel, Galeri, dan Produk
- Manajemen profil admin (edit data diri, ubah kata sandi, foto profil)
- Sistem notifikasi aktivitas real-time
- Upload gambar dengan penyimpanan lokal

## Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL

### Langkah Instalasi

1. Clone repository: