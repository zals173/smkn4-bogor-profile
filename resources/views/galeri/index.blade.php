@extends('layouts.app')

@section('title', 'Galeri Sekolah - SMK Negeri 4 Bogor')

@section('content')

{{-- HERO SECTION --}}
<section class="bg-navy text-white">
    <div class="max-w-5xl mx-auto px-6 py-20 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">
            Galeri Sekolah
        </h1>
        <p class="text-white/70 max-w-2xl mx-auto">
            Momen-momen inspiratif, fasilitas berstandar industri, dan prestasi membanggakan sivitas akademika SMK Negeri 4 Kota Bogor.
        </p>
    </div>
</section>

{{-- FILTER & SEARCH --}}
<section class="max-w-7xl mx-auto px-6 pt-10">
    <form method="GET" action="{{ route('galeri.index') }}" class="flex flex-col md:flex-row justify-between gap-4 mb-10">
        <div class="relative w-full md:w-80">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7" />
                <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
            </svg>
            <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari galeri..."
                class="w-full border border-gray-300 rounded-lg pl-9 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
        </div>

        <div class="flex flex-wrap gap-2">
            @php
            $kategoriList = ['Semua' => 'navy', 'Prestasi' => 'success', 'Kegiatan' => 'blue', 'Fasilitas' => 'gold'];
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

{{-- GRID GALERI --}}
<section class="max-w-7xl mx-auto px-6 pb-20">
    @if (count($galeri) > 0)
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="galeri-grid">
        @foreach ($galeri as $index => $item)
        <button type="button"
            class="galeri-item group relative rounded-lg overflow-hidden text-left {{ $index >= 12 ? 'hidden' : '' }}"
            data-index="{{ $index }}"
            data-gambar="{{ str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('images/' . $item->gambar) }}"
            data-judul="{{ $item->judul }}"
            data-kategori="{{ $item->kategori }}">
            <img src="{{ str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('images/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-40 object-cover transition-transform duration-300 group-hover:scale-105">
            <span class="absolute top-2 left-2 {{ $item->kategori === 'Prestasi' ? 'bg-success' : ($item->kategori === 'Kegiatan' ? 'bg-blue-600' : 'bg-gold') }} text-white text-[10px] font-bold px-2 py-1 rounded uppercase">
                {{ $item->kategori }}
            </span>
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                <span class="text-white text-xs font-semibold line-clamp-1">{{ $item->judul }}</span>
            </div>
        </button>
        @endforeach
    </div>

    @if (count($galeri) > 12)
    <div class="text-center mt-10">
        <button type="button" id="muat-lebih-banyak" class="inline-flex items-center gap-2 border-2 border-gold text-gold font-semibold px-6 py-3 rounded hover:bg-gold hover:text-navy transition">
            Muat Lebih Banyak
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>
    @endif
    @else
    <div class="text-center py-20 text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <circle cx="11" cy="11" r="7" />
            <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
        </svg>
        <p>Tidak ada foto yang ditemukan.</p>
    </div>
    @endif
</section>

{{-- LIGHTBOX MODAL --}}
<div id="lightbox" class="fixed inset-0 bg-black/90 z-[100] hidden items-center justify-center px-4">
    <button type="button" id="lightbox-close" class="absolute top-6 right-6 text-white hover:text-gold transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <button type="button" id="lightbox-prev" class="absolute left-4 md:left-8 text-white hover:text-gold transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <div class="max-w-2xl w-full text-center">
        <span id="lightbox-counter" class="text-white/50 text-sm block mb-3"></span>
        <img id="lightbox-image" src="" alt="" class="max-h-[60vh] w-full object-contain rounded-lg mb-4">
        <span id="lightbox-kategori" class="inline-block text-white text-xs font-bold px-3 py-1 rounded uppercase mb-2"></span>
        <h3 id="lightbox-judul" class="text-white font-bold text-lg"></h3>
    </div>

    <button type="button" id="lightbox-next" class="absolute right-4 md:right-8 text-white hover:text-gold transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>

@endsection