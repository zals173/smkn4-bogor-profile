@php
    header('Cache-Control: no-cache, no-store, must-revalidate');
@endphp
@extends('layouts.app')

@section('title', 'Artikel & Berita - SMK Negeri 4 Bogor')

@section('content')

{{-- HERO SECTION --}}
<section class="bg-navy text-white">
    <div class="max-w-7xl mx-auto px-6 pt-10 pb-20">
        <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-sm text-white/70 hover:text-gold transition mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Beranda
        </a>
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">
                Artikel & Berita Sekolah
            </h1>
            <p class="text-white/70 max-w-2xl mx-auto">
                Informasi terkini seputar kegiatan sekolah, prestasi siswa, dan pengumuman.
            </p>
        </div>
    </div>
</section>

{{-- FILTER & SEARCH --}}
<section class="max-w-7xl mx-auto px-6 pt-10">
    <form method="GET" action="{{ route('artikel.index') }}" class="flex flex-col md:flex-row justify-between gap-4 mb-10" data-aos="fade-up">
        <div class="relative w-full md:w-80">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7" />
                <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
            </svg>
            <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari artikel..."
                class="w-full border border-gray-300 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
        </div>

        <div class="flex flex-wrap gap-2">
            @php
            $kategoriList = ['Semua' => 'navy', 'Prestasi' => 'success', 'Kegiatan' => 'blue', 'Pengumuman' => 'danger'];
            @endphp
            @foreach ($kategoriList as $nama => $warna)
            <button type="submit" name="kategori" value="{{ $nama }}"
                class="px-4 py-2 rounded-full text-sm font-semibold border transition
                        {{ $kategoriAktif === $nama
                            ? ($warna === 'navy' ? 'bg-navy text-white border-navy' : ($warna === 'blue' ? 'bg-blue-600 text-white border-blue-600' : "bg-$warna text-white border-$warna"))
                            : 'bg-white text-gray-600 border-gray-200 hover:border-navy' }}">
                {{ $nama }}
            </button>
            @endforeach
        </div>
    </form>
</section>

{{-- GRID ARTIKEL --}}
<section class="max-w-7xl mx-auto px-6 pb-20">
    @if (count($artikel) > 0)
    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($artikel as $index => $item)
        <a href="{{ route('artikel.show', $item->slug) }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
            <div class="relative overflow-hidden">
                <span class="absolute top-3 left-3 {{ $item->kategori === 'Kegiatan' ? 'bg-blue-600' : ($item->kategori === 'Prestasi' ? 'bg-success' : 'bg-danger') }} text-white text-[10px] font-bold px-2 py-1 rounded z-10 uppercase">{{ $item->kategori }}</span>
                <img src="{{ str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('images/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-44 object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-5">
                <div class="flex items-center gap-4 text-xs text-gray-400 mb-2">
                    <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $item->tayangan }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        {{ $item->suka }}
                    </span>
                </div>
                <h3 class="font-bold text-navy mb-2 leading-snug">{{ $item->judul }}</h3>
                <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $item->ringkasan }}</p>
                <span class="text-navy font-semibold text-sm group-hover:text-gold transition">Baca Selengkapnya</span>
            </div>
        </a>
        @endforeach
    </div>

    {{ $artikel->links('partials.pagination') }}

    @else
    <div class="text-center py-20 text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <circle cx="11" cy="11" r="7" />
            <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
        </svg>
        <p>Tidak ada artikel yang ditemukan.</p>
    </div>
    @endif
</section>

@endsection