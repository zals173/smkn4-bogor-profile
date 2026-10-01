@extends('layouts.app')

@section('title', 'SMK Negeri 4 Bogor')

@section('content')

{{-- HERO SECTION --}}
<section id="hero" data-section="beranda" class="relative bg-navy text-white overflow-hidden">
    <div class="absolute inset-0">
        <img src="/images/hero-bg.jpg" alt="SMK Negeri 4 Bogor" class="w-full h-full object-cover opacity-40">
    </div>

    <div class="relative max-w-5xl mx-auto px-6 py-28 text-center" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
            Membangun Masa Depan Digital<br>Melalui Pendidikan Vokasi
        </h1>
        <p class="text-white/80 max-w-2xl mx-auto mb-8">
            Menyiapkan tenaga kerja profesional yang kompeten dan berkarakter unggul sejak tahun 2009.
        </p>

        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('jurusan.index') }}" class="bg-gold text-navy font-semibold px-6 py-3 rounded hover:opacity-90 transition">
                LIHAT PROGRAM KAMI
            </a>
            <a href="https://jabarprov.go.id/layanan/spmb2026" target="_blank" rel="noopener" class="border border-white text-white font-semibold px-6 py-3 rounded hover:bg-white hover:text-navy transition">
                INFO SPMB
            </a>
        </div>
    </div>

    <div class="absolute bottom-8 right-6 md:right-16 inline-flex items-center gap-2.5 bg-navy/60 backdrop-blur border border-white/30 rounded-lg px-5 py-3 text-sm md:text-base z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
        </svg>
        Terakreditasi A
    </div>
</section>

{{-- FEATURE STRIP --}}
<section class="bg-navy border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap justify-between items-center gap-x-3 gap-y-2 text-white/80 text-sm">
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V11l-6-4v4l-6-4v14M9 21h10M5 21h.01M9 9h.01M9 13h.01M9 17h.01M13 13h.01M13 17h.01" />
            </svg>
            KURIKULUM INDUSTRI
        </span>
        <span class="text-white/30 hidden md:inline">•</span>
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 4a4 4 0 00-3-3.87" />
            </svg>
            PENGAJAR BERPENGALAMAN
        </span>
        <span class="text-white/30 hidden md:inline">•</span>
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4M9 9h.01M9 12h.01M9 15h.01M9 18h.01" />
            </svg>
            FASILITAS MODERN
        </span>
        <span class="text-white/30 hidden md:inline">•</span>
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0zM3.6 9h16.8M3.6 15h16.8M12 3a15 15 0 010 18M12 3a15 15 0 000 18" />
            </svg>
            JARINGAN MITRA GLOBAL
        </span>
        <span class="text-white/30 hidden md:inline">•</span>
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            LINGKUNGAN SUPORTIF
        </span>
    </div>
</section>

{{-- TENTANG SECTION --}}
<section id="tentang" data-section="tentang" class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-start">

        <div data-aos="fade-right">
            <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3">
                Tentang
            </span>
            <h2 class="text-3xl font-bold text-navy mt-2 mb-4">
                Dedikasi Menuju Keunggulan Vokasi
            </h2>
            <p class="text-gray-600 mb-6">
                Berdiri sejak tahun 2009, SMK NEGERI 4 KOTA BOGOR telah menjadi institusi pelopor dalam pendidikan vokasi berbasis teknologi. Kami memadukan kedisiplinan akademis dengan kurikulum industri terkini untuk mencetak lulusan yang tidak hanya siap kerja, tetapi juga siap memimpin di era digital.
            </p>

            <div class="space-y-4 mb-6">
                <div class="flex gap-3" data-aos="fade-up" data-aos-delay="0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-navy">Inovasi Teknologi</h3>
                        <p class="text-sm text-gray-500">Fasilitas laboratorium standar industri untuk mendukung eksplorasi digital.</p>
                    </div>
                </div>
                <div class="flex gap-3" data-aos="fade-up" data-aos-delay="100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0118 20.945 12.083 12.083 0 016 9.578L12 14zm0 0v6.5" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-navy">Karakter Unggul</h3>
                        <p class="text-sm text-gray-500">Penekanan pada etika profesional, kedisiplinan, dan kepemimpinan.</p>
                    </div>
                </div>
                <div class="flex gap-3" data-aos="fade-up" data-aos-delay="200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553-2.276A1 1 0 0021 13.618V2.382a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-navy">Kemitraan Industri</h3>
                        <p class="text-sm text-gray-500">Kolaborasi erat dengan puluhan perusahaan terkemuka untuk penempatan kerja.</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('tentang') }}" class="inline-block bg-navy text-white font-semibold px-6 py-3 rounded hover:opacity-90 transition">
                PELAJARI LEBIH LANJUT
            </a>
        </div>

        <div class="relative" data-aos="fade-left">
            <img src="/images/tentang-siswa.jpg" alt="Kegiatan Belajar" class="rounded-lg w-full h-96 object-cover">

            <div class="absolute top-8 -right-6 bg-navy shadow-xl rounded-lg px-4 py-2.5 flex items-center gap-2.5">
                <div class="bg-gold/20 rounded-full h-9 w-9 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <div>
                    <div class="text-white font-bold text-base leading-tight">10+</div>
                    <div class="text-white/70 text-[10px] uppercase tracking-wide leading-tight">Ekstrakurikuler</div>
                </div>
            </div>

            <div class="absolute -bottom-4 -left-4 bg-white shadow-lg rounded-lg px-4 py-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 4a4 4 0 00-3-3.87" />
                </svg>
                <div>
                    <div class="text-navy font-bold">1:20</div>
                    <div class="text-xs text-gray-500">Rasio Pengajar : Siswa</div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- JURUSAN PREVIEW SECTION --}}
<section id="jurusan-preview" data-section="jurusan" class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex justify-between items-end mb-10 flex-wrap gap-4" data-aos="fade-up">
        <div>
            <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3">
                Jurusan
            </span>
            <h2 class="text-3xl font-bold text-navy mt-2">
                Jurusan Yang Ada di Sekolah Kami
            </h2>
        </div>
        <a href="{{ route('jurusan.index') }}" class="text-navy font-semibold text-sm hover:text-gold flex items-center gap-1">
            Lihat Semua Program
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <a href="{{ route('jurusan.show', 'pplg') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="0">
            <div class="relative bg-gray-50 flex items-center justify-center py-8 overflow-hidden">
                <span class="absolute top-3 left-3 bg-navy text-white text-[10px] font-bold px-2 py-1 rounded z-10">PPLG</span>
                <img src="/images/logo-pplg.png" alt="Logo PPLG" class="h-24 w-24 object-contain transition-transform duration-300 group-hover:scale-110">
            </div>
            <div class="p-5">
                <h3 class="font-bold text-navy mb-2 leading-snug">Pengembangan Perangkat Lunak dan Gim</h3>
                <p class="text-sm text-gray-500 mb-3">Fokus pada pemrograman dan pengembangan aplikasi modern.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Detail</span>
            </div>
        </a>

        <a href="{{ route('jurusan.show', 'tjkt') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
            <div class="relative bg-gray-50 flex items-center justify-center py-8 overflow-hidden">
                <span class="absolute top-3 left-3 bg-navy text-white text-[10px] font-bold px-2 py-1 rounded z-10">TJKT</span>
                <img src="/images/logo-tjkt.png" alt="Logo TJKT" class="h-24 w-24 object-contain transition-transform duration-300 group-hover:scale-110">
            </div>
            <div class="p-5">
                <h3 class="font-bold text-navy mb-2 leading-snug">Teknik Jaringan Komputer dan Telekomunikasi</h3>
                <p class="text-sm text-gray-500 mb-3">Ahli dalam infrastruktur jaringan dan keamanan siber.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Detail</span>
            </div>
        </a>

        <a href="{{ route('jurusan.show', 'tpfl') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
            <div class="relative bg-gray-50 flex items-center justify-center py-8 overflow-hidden">
                <span class="absolute top-3 left-3 bg-navy text-white text-[10px] font-bold px-2 py-1 rounded z-10">TPFL</span>
                <img src="/images/logo-tpfl.png" alt="Logo TPFL" class="h-24 w-24 object-contain transition-transform duration-300 group-hover:scale-110">
            </div>
            <div class="p-5">
                <h3 class="font-bold text-navy mb-2 leading-snug">Teknik Pemesinan dan Teknik Logam</h3>
                <p class="text-sm text-gray-500 mb-3">Presisi dalam manufaktur dan rekayasa industri.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Detail</span>
            </div>
        </a>

        <a href="{{ route('jurusan.show', 'tkro') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
            <div class="relative bg-gray-50 flex items-center justify-center py-8 overflow-hidden">
                <span class="absolute top-3 left-3 bg-navy text-white text-[10px] font-bold px-2 py-1 rounded z-10">TKRO</span>
                <img src="/images/logo-tkro.png" alt="Logo TKRO" class="h-24 w-24 object-contain transition-transform duration-300 group-hover:scale-110">
            </div>
            <div class="p-5">
                <h3 class="font-bold text-navy mb-2 leading-snug">Teknik Kendaraan Ringan Otomotif</h3>
                <p class="text-sm text-gray-500 mb-3">Teknologi otomotif terkini dan perawatan kendaraan modern.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Detail</span>
            </div>
        </a>

    </div>
</section>

{{-- STATISTIK SECTION --}}
<section class="bg-navy">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center">
            <div data-aos="fade-up" data-aos-delay="0">
                <div class="text-gold font-bold text-3xl md:text-4xl">2009</div>
                <div class="text-white/60 text-xs uppercase tracking-wide mt-1">Tahun Berdiri</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="text-gold font-bold text-3xl md:text-4xl">1.200+</div>
                <div class="text-white/60 text-xs uppercase tracking-wide mt-1">Siswa Aktif</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="text-gold font-bold text-3xl md:text-4xl">4</div>
                <div class="text-white/60 text-xs uppercase tracking-wide mt-1">Program Keahlian</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="text-gold font-bold text-3xl md:text-4xl">98%</div>
                <div class="text-white/60 text-xs uppercase tracking-wide mt-1">Tingkat Kelulusan</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="400">
                <div class="text-gold font-bold text-3xl md:text-4xl">A</div>
                <div class="text-white/60 text-xs uppercase tracking-wide mt-1">Akreditasi</div>
            </div>
        </div>
    </div>
</section>

{{-- ARTIKEL & BERITA TERBARU --}}
<section id="artikel-preview" data-section="artikel" class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex justify-between items-end mb-10 flex-wrap gap-4" data-aos="fade-up">
        <div>
            <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3">
                Artikel
            </span>
            <h2 class="text-3xl font-bold text-navy mt-2">
                Artikel & Berita Terbaru
            </h2>
        </div>
        <a href="{{ route('artikel.index') }}" class="text-navy font-semibold text-sm hover:text-gold flex items-center gap-1">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        <a href="{{ route('artikel.show', 'juara-3-lomba-kompetensi-siswa') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="0">
            <div class="relative overflow-hidden">
                <span class="absolute top-3 left-3 bg-success text-white text-[10px] font-bold px-2 py-1 rounded z-10 uppercase">Prestasi</span>
                <img src="/images/artikel-1.jpeg" alt="Juara 3 Lomba Kompetensi Siswa" class="w-full h-44 object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-5">
                <div class="flex items-center gap-4 text-xs text-gray-400 mb-2">
                    <span>12 Juni 2026</span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        950
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        62
                    </span>
                </div>
                <h3 class="font-bold text-navy mb-2 leading-snug">Juara 3 dalam Lomba Kompetensi Siswa (LKS)</h3>
                <p class="text-sm text-gray-500 mb-3 line-clamp-2">Selamat dan sukses kepada Novandra Aria atas prestasi luar biasa berhasil meraih Juara 3 dalam Lomba Kompetensi Siswa (LKS) Tingkat Provinsi Jawa Barat pada Bidang Keahlian Cloud Computing.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Baca Selengkapnya</span>
            </div>
        </a>

        <a href="{{ route('artikel.show', 'kr4bat-mengaji') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
            <div class="relative overflow-hidden">
                <span class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded z-10 uppercase">Kegiatan</span>
                <img src="/images/artikel-2.jpeg" alt="KR4BAT Mengaji" class="w-full h-44 object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-5">
                <div class="flex items-center gap-4 text-xs text-gray-400 mb-2">
                    <span>7 Agustus 2026</span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        250
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        170
                    </span>
                </div>
                <h3 class="font-bold text-navy mb-2 leading-snug">KR4BAT Mengaji</h3>
                <p class="text-sm text-gray-500 mb-3 line-clamp-2">Kegiatan KR4BAT Mengaji rutin digelar setiap pekan sebagai wujud pembinaan karakter dan spiritualitas siswa SMK SISFO SEKOLAH, sejalan dengan nilai "Kejuruan 4 Hebat" yang dijunjung sekolah.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Baca Selengkapnya</span>
            </div>
        </a>

        <a href="{{ route('artikel.show', 'larangan-aktivitas-penjualan-seragam-sekolah') }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
            <div class="relative overflow-hidden">
                <span class="absolute top-3 left-3 bg-danger text-white text-[10px] font-bold px-2 py-1 rounded z-10 uppercase">Pengumuman</span>
                <img src="/images/artikel-3.jpg" alt="Larangan Aktivitas Penjualan Seragam Sekolah" class="w-full h-44 object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-5">
                <div class="flex items-center gap-4 text-xs text-gray-400 mb-2">
                    <span>25 Juni 2026</span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        890
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        170
                    </span>
                </div>
                <h3 class="font-bold text-navy mb-2 leading-snug">Larangan Aktivitas Penjualan Seragam Sekolah</h3>
                <p class="text-sm text-gray-500 mb-3 line-clamp-2">Menindaklanjuti Surat Kepala Dinas Pendidikan Provinsi Jawa Barat No. 16739/PW.03/SEKRE, SMKN 4 Bogor menegaskan larangan pengarahan pengadaan seragam oleh pendidik serta menjamin kebebasan orang tua/wali dalam pengadaan seragam sekolah.</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Baca Selengkapnya</span>
            </div>
        </a>

    </div>
</section>

{{-- GALERI SEKOLAH --}}
<section id="galeri-preview" data-section="galeri" class="max-w-7xl mx-auto px-6 pb-20">
    <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3" data-aos="fade-up">
        Galeri
    </span>
    <h2 class="text-3xl font-bold text-navy mt-2 mb-8" data-aos="fade-up">
        Galeri Sekolah
    </h2>

    <div class="grid grid-cols-3 gap-3">
        <div class="rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="0">
            <img src="/images/galeri-1.jpg" alt="Upacara Bendera" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="50">
            <img src="/images/galeri-2.jpg" alt="Kegiatan Sekolah" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <img src="/images/galeri-3.jpg" alt="Lingkungan Sekolah" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div class="rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="150">
            <img src="/images/galeri-4.jpg" alt="Kegiatan Siswa" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <a href="{{ route('galeri.index') }}" class="rounded-lg bg-gold flex flex-col items-center justify-center text-navy text-center h-48 hover:opacity-90 transition" data-aos="fade-up" data-aos-delay="200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="font-bold text-sm mb-1">Lihat Lebih Banyak</span>
            <span class="text-xs underline">Jelajahi Galeri</span>
        </a>
        <div class="rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="250">
            <img src="/images/galeri-5.jpg" alt="Ekstrakurikuler" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
        </div>
    </div>
</section>

{{-- CTA SPMB SECTION --}}
<section class="max-w-7xl mx-auto px-6 pb-20" data-aos="fade-up">
    <div class="bg-navy rounded-xl overflow-hidden grid md:grid-cols-2">
        <div class="h-64 md:h-auto">
            <img src="/images/cta-spmb.jpg" alt="SMK Negeri 4 Bogor" class="w-full h-full object-cover">
        </div>
        <div class="p-8 md:p-12 flex flex-col justify-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">
                Bergabunglah dengan SMK NEGERI 4 KOTA BOGOR
            </h2>
            <p class="text-white/70 mb-6">
                Pendaftaran Siswa Baru (SPMB) Tahun Ajaran 2026/2027 telah dibuka. Raih kesempatan belajar di institusi vokasi terbaik dengan fasilitas modern dan kurikulum industri terkini.
            </p>
            <div class="flex gap-4 flex-wrap">
                <a href="https://jabarprov.go.id/layanan/spmb2026" target="_blank" rel="noopener" class="bg-gold text-navy font-semibold px-6 py-3 rounded hover:opacity-90 transition">
                    INFO JADWAL SPMB
                </a>
                <a href="#kontak" class="border border-white text-white font-semibold px-6 py-3 rounded hover:bg-white hover:text-navy transition">
                    HUBUNGI KAMI
                </a>
            </div>
        </div>
    </div>
</section>

{{-- KONTAK SECTION --}}
<section id="kontak" data-section="kontak" class="max-w-7xl mx-auto px-6 pb-20">
    <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3" data-aos="fade-up">
        Kontak
    </span>
    <h2 class="text-3xl font-bold text-navy mt-2 mb-10" data-aos="fade-up">
        Hubungi Kami
    </h2>

    {{-- BARIS 1: INFO KONTAK (3 kolom horizontal) --}}
    <div class="grid sm:grid-cols-3 gap-6 mb-8">
        <div class="flex gap-4" data-aos="fade-up" data-aos-delay="0">
            <div class="bg-navy/5 rounded-full h-11 w-11 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-navy mb-1">Alamat Sekolah</h3>
                <p class="text-sm text-gray-500">Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
            </div>
        </div>
        <div class="flex gap-4" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-navy/5 rounded-full h-11 w-11 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.517l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-navy mb-1">Telepon</h3>
                <p class="text-sm text-gray-500">(0251) 7547381</p>
            </div>
        </div>
        <div class="flex gap-4" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-navy/5 rounded-full h-11 w-11 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-navy mb-1">Email</h3>
                <p class="text-sm text-gray-500">smkn4@smkn4bogor.sch.id</p>
            </div>
        </div>
    </div>

    {{-- BARIS 2: KARTU MAPS + KARTU HUBUNGI LANGSUNG (setara) --}}
    <div class="grid md:grid-cols-2 gap-6">

        <a href="https://www.google.com/maps/search/?api=1&query=SMK+Negeri+4+Kota+Bogor" target="_blank" rel="noopener"
            class="group flex flex-col items-center justify-center rounded-lg border border-gray-200 bg-gray-50 hover:bg-navy/5 transition text-center px-6 py-12" data-aos="fade-right">
            <div class="bg-navy/10 group-hover:bg-navy/20 rounded-full h-14 w-14 flex items-center justify-center mb-3 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h4 class="font-semibold text-navy mb-1">Lihat Lokasi di Google Maps</h4>
            <p class="text-sm text-gray-500 mb-3">SMK Negeri 4 Kota Bogor</p>
            <span class="inline-flex items-center gap-1.5 text-navy font-semibold text-sm group-hover:text-gold transition">
                Buka di Google Maps
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </span>
        </a>

        <div class="rounded-lg border border-gray-200 px-6 py-8 flex flex-col justify-center" data-aos="fade-left">
            <h3 class="text-lg font-semibold text-navy mb-1">Hubungi Kami Langsung</h3>
            <p class="text-sm text-gray-500 mb-5">
                Punya pertanyaan seputar pendaftaran, program keahlian, atau informasi lainnya? Tim kami siap membantu.
            </p>

            <div class="space-y-3">
                <a href="https://wa.me/6282122622442" target="_blank" rel="noopener"
                    class="flex items-center gap-3 border border-gray-200 rounded-lg p-3.5 hover:border-success hover:bg-success/5 transition group">
                    <div class="bg-success/10 group-hover:bg-success/20 rounded-full h-10 w-10 flex items-center justify-center shrink-0 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            <path d="M12.031 0h-.062C5.446 0 .102 5.345.102 11.917c0 2.614.848 5.037 2.288 7.001L.815 24l5.221-1.575A11.87 11.87 0 0012.031 24C18.554 24 24 18.653 24 12.083 24 5.512 18.554 0 12.031 0zm6.99 18.87a9.907 9.907 0 01-6.99 2.895 9.933 9.933 0 01-5.038-1.371l-.36-.214-3.098.934.938-3.02-.235-.375A9.912 9.912 0 012.13 11.917c0-5.478 4.457-9.933 9.9-9.933a9.87 9.87 0 017.019 2.918 9.848 9.848 0 012.898 6.988c0 5.478-4.457 9.98-6.926 9.98z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-navy text-sm">Chat via WhatsApp</h4>
                        <p class="text-xs text-gray-500">+62 821 226 2442</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="mailto:smkn4@smkn4bogor.sch.id"
                    class="flex items-center gap-3 border border-gray-200 rounded-lg p-3.5 hover:border-navy hover:bg-navy/5 transition group">
                    <div class="bg-navy/5 group-hover:bg-navy/10 rounded-full h-10 w-10 flex items-center justify-center shrink-0 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-navy text-sm">Kirim Email</h4>
                        <p class="text-xs text-gray-500">smkn4@smkn4bogor.sch.id</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-300 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
</section>

@endsection