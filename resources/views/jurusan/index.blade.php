@extends('layouts.app')

@section('title', 'Jurusan - SMK Negeri 4 Bogor')

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
                Jurusan Keahlian di SMK Negeri 4 Kota Bogor
            </h1>
            <p class="text-white/70 max-w-2xl mx-auto">
                Temukan program keahlian yang sesuai dengan minat dan bakatmu, dirancang untuk mencetak lulusan profesional yang siap menghadapi tantangan industri global.
            </p>
        </div>
    </div>
</section>

{{-- GRID JURUSAN --}}
<section class="max-w-7xl mx-auto px-6 py-16">
    @if ($jurusan->count() > 0)
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($jurusan as $item)
            <a href="{{ route('jurusan.show', $item->slug) }}" class="group block bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                <div class="relative overflow-hidden">
                    <span class="absolute top-3 left-3 bg-navy text-white text-[10px] font-bold px-2 py-1 rounded z-10">{{ $item->kode }}</span>
                    <img src="{{ $item->gambar_sampul && str_contains($item->gambar_sampul, '/') ? asset('storage/' . $item->gambar_sampul) : asset('images/' . ($item->gambar_sampul ?? 'jurusan-' . $item->slug . '.jpg')) }}"
                        alt="{{ $item->nama }}" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-navy mb-2">{{ $item->nama }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ $item->tagline }}</p>
                    <div class="flex items-center gap-6 text-xs text-gray-500 mb-4 pt-4 border-t border-gray-100">
                        <span class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            {{ count($item->kompetensi ?? []) }} Kompetensi Utama
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            {{ count($item->prospek ?? []) }} Prospek Karier
                        </span>
                    </div>
                    <span class="text-gold font-semibold text-sm inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                        Lihat Detail
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 text-gray-400">
            <p>Belum ada data jurusan.</p>
        </div>
    @endif
</section>

{{-- CTA MASIH BINGUNG --}}
<section class="max-w-4xl mx-auto px-6 pb-20">
    <div class="border-2 border-gray-100 rounded-xl text-center py-14 px-6">
        <h2 class="text-2xl font-bold text-navy mb-3">Masih Bingung Memilih Jurusan?</h2>
        <p class="text-gray-500 max-w-lg mx-auto mb-6">
            Tim konseling kami siap membantu kamu menemukan jurusan yang tepat sesuai dengan potensi dan tujuan karier ke depan.
        </p>
        <a href="https://wa.me/6282122622442" target="_blank" rel="noopener"
            class="inline-block border-2 border-navy text-navy font-semibold px-8 py-3 rounded-lg hover:bg-navy hover:text-white transition">
            Hubungi Kami
        </a>
    </div>
</section>

@endsection