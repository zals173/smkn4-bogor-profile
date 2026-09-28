@extends('layouts.admin')

@section('title', 'Dashboard - Admin SMK Negeri 4 Bogor')
@section('page-title', 'Dashboard')

@section('content')

<div class="mb-6">
    <h2 class="text-xl font-bold text-navy">Halo, {{ auth()->user()->name }}! 👋</h2>
    <p class="text-sm text-gray-500">Berikut ringkasan data website sekolah saat ini.</p>
</div>

{{-- STATS --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    @foreach ($stats as $stat)
        <a href="{{ route($stat['route']) }}" class="bg-white rounded-lg shadow-sm p-5 flex items-center justify-between hover:shadow-md hover:-translate-y-0.5 transition">
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">{{ $stat['label'] }}</p>
                <p class="text-2xl font-bold text-navy">{{ $stat['nilai'] }}</p>
                <p class="text-xs {{ $stat['trend'] === 'up' ? 'text-success' : 'text-gray-400' }} mt-1">
                    {{ $stat['trend'] === 'up' ? '↗ ' : '' }}{{ $stat['info'] }}
                </p>
            </div>
            <div class="bg-navy/5 rounded-full h-11 w-11 flex items-center justify-center shrink-0">
                @switch($stat['icon'])
                    @case('book')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5c-1.5-1-4-1.5-6-1.5v13c2 0 4.5.5 6 1.5 1.5-1 4-1.5 6-1.5V5c-2 0-4.5.5-6 1.5z" />
                        </svg>
                        @break
                    @case('document')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        @break
                    @case('image')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        @break
                    @case('box')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        @break
                @endswitch
            </div>
        </a>
    @endforeach
</div>

{{-- TREN KONTEN & ARTIKEL POPULER --}}
<div class="grid lg:grid-cols-3 gap-5 mb-6">

    <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-5">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-navy text-sm">Tren Konten Terbit</h3>
            <span class="text-xs text-gray-400">Artikel &amp; Galeri &middot; 6 Bulan Terakhir</span>
        </div>

        @php
            $n = count($trenKonten);
            $maks = max(1, max(array_column($trenKonten, 'jumlah')));
            $titik = [];
            foreach ($trenKonten as $i => $item) {
                $titik[] = [
                    'x' => round(30 + ($n > 1 ? $i * (540 / ($n - 1)) : 0), 1),
                    'y' => round(150 - ($item['jumlah'] / $maks) * 120, 1),
                    'jumlah' => $item['jumlah'],
                    'bulan' => $item['bulan'],
                ];
            }
            $garis = collect($titik)->map(fn ($t) => $t['x'] . ',' . $t['y'])->implode(' ');
            $area = '30,150 ' . $garis . ' ' . end($titik)['x'] . ',150';
        @endphp

        <svg viewBox="0 0 600 200" class="w-full h-auto">
            <line x1="30" y1="150" x2="570" y2="150" stroke="#E5E7EB" stroke-width="1" />
            <line x1="30" y1="90" x2="570" y2="90" stroke="#F3F4F6" stroke-width="1" />
            <line x1="30" y1="30" x2="570" y2="30" stroke="#F3F4F6" stroke-width="1" />
            <polygon points="{{ $area }}" fill="#D4A017" fill-opacity="0.12" />
            <polyline points="{{ $garis }}" fill="none" stroke="#D4A017" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round" />
            @foreach ($titik as $t)
                <circle cx="{{ $t['x'] }}" cy="{{ $t['y'] }}" r="4.5" fill="#fff" stroke="#0B2545" stroke-width="2" />
                <text x="{{ $t['x'] }}" y="{{ $t['y'] - 12 }}" text-anchor="middle" font-size="12" font-weight="600" fill="#0B2545">{{ $t['jumlah'] }}</text>
                <text x="{{ $t['x'] }}" y="180" text-anchor="middle" font-size="12" fill="#9CA3AF">{{ $t['bulan'] }}</text>
            @endforeach
        </svg>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-5">
        <h3 class="font-semibold text-navy text-sm mb-4">Artikel Populer</h3>
        <div class="space-y-3">
            @forelse ($artikelPopuler as $item)
                <a href="{{ route('admin.artikel.index', ['cari' => $item->judul]) }}" class="flex items-start gap-3 group">
                    <div class="bg-navy/5 rounded h-8 w-8 flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-navy leading-snug line-clamp-2 group-hover:text-gold transition">{{ $item->judul }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $item->views }} dilihat</p>
                    </div>
                </a>
            @empty
                <p class="text-sm text-gray-400">Belum ada artikel yang dipublikasikan.</p>
            @endforelse
        </div>
    </div>

</div>

{{-- AKTIVITAS TERBARU & GALERI TERBARU --}}
<div class="grid lg:grid-cols-2 gap-5">

    <div class="bg-white rounded-lg shadow-sm p-5">
        <h3 class="font-semibold text-navy text-sm mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-4">
            @forelse ($aktivitasTerbaru as $item)
                <div class="flex gap-3">
                    <div class="bg-gold rounded-full h-2 w-2 mt-2 shrink-0"></div>
                    <div>
                        <p class="text-sm text-gray-700">
                            {{ $item['jenis'] }}
                            <span class="font-semibold text-navy">&ldquo;{{ $item['judul'] }}&rdquo;</span>
                            {{ $item['aksi'] }}.
                        </p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $item['waktu']->locale('id')->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-400">Belum ada aktivitas.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-navy text-sm">Unggahan Galeri Terbaru</h3>
            <a href="{{ route('admin.galeri.index') }}" class="text-xs text-gold font-semibold hover:underline">Lihat Semua</a>
        </div>
        @if ($galeriTerbaru->count() > 0)
            <div class="grid grid-cols-3 gap-2">
                @foreach ($galeriTerbaru as $foto)
                    <img src="{{ str_contains($foto->gambar, '/') ? asset('storage/' . $foto->gambar) : asset('images/' . $foto->gambar) }}"
                         alt="{{ $foto->judul }}" class="w-full h-20 object-cover rounded">
                @endforeach
            </div>
        @else
            <p class="text-sm text-gray-400">Belum ada foto galeri.</p>
        @endif
    </div>

</div>

@endsection