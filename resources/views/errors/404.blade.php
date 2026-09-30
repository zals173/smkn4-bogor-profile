@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan - SMK Negeri 4 Bogor')

@section('content')
<section class="min-h-[70vh] flex items-center justify-center px-6 py-20">
    <div class="max-w-md mx-auto text-center">
        <div class="bg-navy/5 rounded-full h-24 w-24 flex items-center justify-center mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="text-gold font-bold text-6xl mb-3">404</div>
        <h1 class="text-2xl font-bold text-navy mb-3">Halaman Tidak Ditemukan</h1>
        <p class="text-gray-500 mb-8">
            Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin sudah dipindahkan atau alamatnya salah ketik.
        </p>
        <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-gold text-navy font-semibold px-6 py-3 rounded-lg hover:opacity-90 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</section>
@endsection