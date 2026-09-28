@extends('layouts.app')

@section('title', $jurusan['nama'] . ' - SMK Negeri 4 Bogor')

@section('content')

{{-- HERO SECTION --}}
<section class="relative bg-slate-600 overflow-hidden">
    <div class="absolute inset-0 flex items-center justify-center gap-8 opacity-15 px-6">
        <img src="/images/logo-{{ $jurusan['slug'] }}.png" alt="" class="w-24 h-24 object-contain hidden md:block">
        <img src="/images/logo-{{ $jurusan['slug'] }}.png" alt="" class="w-32 h-32 object-contain">
        <img src="/images/logo-{{ $jurusan['slug'] }}.png" alt="" class="w-24 h-24 object-contain hidden md:block">
    </div>
    <div class="absolute inset-0 bg-navy/75"></div>

    <div class="relative max-w-4xl mx-auto px-6 py-20 text-center z-10">
        <h1 class="text-3xl md:text-4xl font-bold text-white leading-snug mb-3">
            {{ $jurusan['nama'] }}
        </h1>
        <p class="text-gold font-medium">{{ $jurusan['tagline'] }}</p>
    </div>
</section>

{{-- TENTANG JURUSAN --}}
<section class="max-w-5xl mx-auto px-6 py-14">
    <a href="{{ route('jurusan.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-navy transition mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Jurusan
    </a>

    <h2 class="text-xl font-bold text-navy mb-5 flex items-center gap-2">
        <span class="w-1 h-6 bg-gold rounded"></span>
        Tentang Jurusan Ini
    </h2>
    <div class="space-y-4 text-gray-600 text-sm leading-relaxed">
        @foreach ($jurusan['deskripsi'] as $paragraf)
            <p>{{ $paragraf }}</p>
        @endforeach
    </div>
</section>

{{-- KOMPETENSI & PROSPEK --}}
<section class="max-w-5xl mx-auto px-6 pb-14">
    <div class="grid md:grid-cols-2 gap-6">

        <div class="bg-white border border-gray-100 rounded-lg shadow-sm p-6">
            <h3 class="font-bold text-navy mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                Kompetensi yang Dipelajari
            </h3>
            <ul class="space-y-2.5">
                @foreach ($jurusan['kompetensi'] as $item)
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white border border-gray-100 rounded-lg shadow-sm p-6">
            <h3 class="font-bold text-navy mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Prospek Karier Lulusan
            </h3>
            <ul class="space-y-2.5">
                @foreach ($jurusan['prospek'] as $item)
                    <li class="flex items-center gap-2 text-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</section>

{{-- FASILITAS PENDUKUNG --}}
@if (!empty($jurusan['fasilitas']))
<section class="max-w-5xl mx-auto px-6 pb-14">
    <h2 class="text-xl font-bold text-navy mb-5 flex items-center gap-2">
        <span class="w-1 h-6 bg-gold rounded"></span>
        Fasilitas Pendukung
    </h2>
    <div class="max-w-2xl mx-auto">
        @foreach ($jurusan['fasilitas'] as $f)
            <div class="rounded-lg overflow-hidden shadow-sm border border-gray-100">
                <div class="relative">
                    @if (!empty($f['badge']))
                        <span class="absolute top-3 right-3 bg-gold text-navy text-[10px] font-bold px-2 py-1 rounded z-10">{{ $f['badge'] }}</span>
                    @endif
                    <img src="{{ str_contains($f['gambar'], '/') ? asset('storage/' . $f['gambar']) : asset('images/' . $f['gambar']) }}"
                         alt="{{ $f['judul'] }}" class="w-full h-56 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent px-4 py-3">
                        <h3 class="text-white font-bold">{{ $f['judul'] }}</h3>
                    </div>
                </div>
                <div class="p-5 bg-white">
                    <p class="text-sm text-gray-500">{{ $f['deskripsi'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- SERTIFIKASI & MITRA --}}
@if (!empty($jurusan['mitra']))
<section class="bg-gray-50 py-14">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-xl font-bold text-navy mb-2">Sertifikasi & Kemitraan Industri</h2>
        <p class="text-sm text-gray-500 mb-8">
            Program {{ $jurusan['kode'] }} bekerja sama dengan berbagai raksasa teknologi untuk menyediakan kurikulum berstandar industri dan sertifikasi profesional bagi siswa.
        </p>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($jurusan['mitra'] as $mitra)
                <div class="bg-white border border-gray-200 rounded-lg px-8 py-6 flex flex-col items-center gap-2 shadow-sm">
                    @if (!empty($mitra['logo']))
                        <img src="{{ str_contains($mitra['logo'], '/') ? asset('storage/' . $mitra['logo']) : asset('images/' . $mitra['logo']) }}"
                             alt="{{ $mitra['nama'] }}" class="h-8 object-contain">
                    @endif
                    <span class="text-xs text-gray-500">{{ $mitra['nama'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="bg-navy border-t-4 border-gold">
    <div class="max-w-3xl mx-auto px-6 py-12 text-center">
        <h2 class="text-xl md:text-2xl font-bold text-white mb-6">
            Tertarik Bergabung dengan Jurusan {{ $jurusan['kode'] }}?
        </h2>
        <a href="#" class="inline-block bg-gold text-navy font-semibold px-8 py-3 rounded hover:opacity-90 transition">
            Info Jadwal SPMB
        </a>
    </div>
</section>

@endsection