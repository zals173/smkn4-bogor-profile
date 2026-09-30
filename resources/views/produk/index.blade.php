@extends('layouts.app')

@section('title', 'Produk Sekolah - SMK Negeri 4 Bogor')

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
                Produk Sekolah
            </h1>
            <p class="text-white/70 max-w-2xl mx-auto">
                Perlengkapan resmi SMK Negeri 4 Kota Bogor untuk kebutuhan seragam dan atribut sekolah siswa.
            </p>
        </div>
    </div>
</section>

{{-- GRID PRODUK --}}
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($produk as $item)
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition">

            <div class="relative bg-gray-50 overflow-hidden">
                <span class="absolute top-3 left-3 bg-navy text-white text-[10px] font-bold px-2 py-1 rounded uppercase z-10">{{ $item->kategori }}</span>
                <img src="{{ str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-56 object-contain p-4 transition-transform duration-300 hover:scale-105">
            </div>

            <div class="p-5">
                <h3 class="font-bold text-navy mb-2 leading-snug">{{ $item->nama }}</h3>
                <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
            </div>

        </div>
        @endforeach
    </div>
</section>

@endsection