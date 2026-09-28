@extends('layouts.app')

@section('title', 'Tentang - SMK Negeri 4 Bogor')

@section('content')

{{-- HERO SECTION --}}
<section class="bg-navy text-white">
    <div class="max-w-5xl mx-auto px-6 py-20 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">
            Tentang SMK Negeri 4 Kota Bogor
        </h1>
        <p class="text-white/70 max-w-2xl mx-auto">
            Mengenal lebih dekat profil, visi-misi, dan kehidupan siswa di SMK Negeri 4 Kota Bogor.
        </p>
    </div>
</section>

{{-- PROFIL SEKOLAH --}}
<section class="max-w-5xl mx-auto px-6 py-16">
    <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-navy transition mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Beranda
    </a>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3">
                Profil Sekolah
            </span>
            <h2 class="text-2xl font-bold text-navy mt-2 mb-4">
                Sejarah & Latar Belakang
            </h2>
            <div class="space-y-4 text-gray-600 text-sm leading-relaxed">
                @foreach ($profil as $paragraf)
                    <p>{{ $paragraf }}</p>
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-navy/5 rounded-lg p-6 text-center">
                <div class="text-navy font-bold text-3xl mb-1">2009</div>
                <div class="text-xs text-gray-500 uppercase tracking-wide">Mulai Beroperasi</div>
            </div>
            <div class="bg-navy/5 rounded-lg p-6 text-center">
                <div class="text-navy font-bold text-3xl mb-1">A</div>
                <div class="text-xs text-gray-500 uppercase tracking-wide">Akreditasi</div>
            </div>
            <div class="bg-navy/5 rounded-lg p-6 text-center col-span-2">
                <div class="text-navy font-bold text-lg mb-1">SMK Pusat Keunggulan</div>
                <div class="text-xs text-gray-500 uppercase tracking-wide">Status Sekolah</div>
            </div>
        </div>
    </div>
</section>

{{-- VISI & MISI --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3">
                Visi & Misi
            </span>
            <h2 class="text-2xl font-bold text-navy mt-2">Arah dan Tujuan Kami</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-sm p-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-gold/20 rounded-full h-11 w-11 flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-lg">Visi</h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $visi }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-gold/20 rounded-full h-11 w-11 flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy text-lg">Misi</h3>
                </div>
                <ul class="space-y-3">
                    @foreach ($misi as $item)
                        <li class="flex gap-2 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- EKSTRAKURIKULER --}}
<section class="max-w-6xl mx-auto px-6 py-16">
    <div class="text-center mb-10">
        <span class="inline-block text-gold font-semibold text-sm uppercase tracking-wide border-b-2 border-gold pb-1 mb-3">
            Kehidupan Siswa
        </span>
        <h2 class="text-2xl font-bold text-navy mt-2">Ekstrakurikuler</h2>
        <p class="text-sm text-gray-500 mt-2 max-w-xl mx-auto">
            Beragam kegiatan ekstrakurikuler untuk mengembangkan minat, bakat, dan karakter siswa di luar jam pelajaran.
        </p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5">
        @foreach ($ekskul as $item)
            <div class="bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 p-6 text-center">
                <div class="bg-navy/5 rounded-full h-14 w-14 flex items-center justify-center mx-auto mb-3">
                    @switch($item['icon'])
                        @case('cross')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9" />
                                <path stroke-linecap="round" d="M12 8v8M8 12h8" />
                            </svg>
                            @break
                        @case('flag')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 21V4m0 0h13l-3 4 3 4H5" />
                            </svg>
                            @break
                        @case('compass')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.5 9.5l-2 5-5 2 2-5 5-2z" />
                            </svg>
                            @break
                        @case('note')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 18V5l11-2v13" />
                                <circle cx="6" cy="18" r="3" />
                                <circle cx="17" cy="16" r="3" />
                            </svg>
                            @break
                        @case('ball')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                <circle cx="12" cy="12" r="9" />
                                <path stroke-linecap="round" d="M3.6 9h16.8M3.6 15h16.8M12 3a15 15 0 010 18M12 3a15 15 0 000 18" />
                            </svg>
                            @break
                        @case('book')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5c-1.5-1-4-1.5-6-1.5v13c2 0 4.5.5 6 1.5 1.5-1 4-1.5 6-1.5V5c-2 0-4.5.5-6 1.5z" />
                                <path stroke-linecap="round" d="M12 6.5v13" />
                            </svg>
                            @break
                        @case('shield')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l7 3v6c0 5-3 8.5-7 11-4-2.5-7-6-7-11V5l7-3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                            </svg>
                            @break
                    @endswitch
                </div>
                <h3 class="font-semibold text-navy text-sm">{{ $item['nama'] }}</h3>
            </div>
        @endforeach
    </div>
</section>

@endsection