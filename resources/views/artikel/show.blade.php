@extends('layouts.app')

@section('title', $artikel->judul . ' - SMK Negeri 4 Bogor')

@section('content')

<section class="max-w-3xl mx-auto px-6 py-14">
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('artikel.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-navy transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Artikel
        </a>
        <span class="inline-block {{ $artikel->kategori === 'Kegiatan' ? 'bg-blue-600' : ($artikel->kategori === 'Prestasi' ? 'bg-success' : 'bg-danger') }} text-white text-xs font-bold px-3 py-1 rounded uppercase">
            {{ $artikel->kategori }}
        </span>
    </div>

    <h1 class="text-2xl md:text-3xl font-bold text-navy mb-4 leading-snug">
        {{ $artikel->judul }}
    </h1>

    <div class="flex items-center gap-5 text-sm text-gray-400 mb-8 pb-6 border-b border-gray-100">
        <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
        <span class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $artikel->views }} views
        </span>
        <button type="button" id="btn-like" data-artikel-id="{{ $artikel->id }}"
                class="flex items-center gap-1 transition {{ $sudahLike ? 'text-danger' : 'text-gray-400 hover:text-danger' }}"
                {{ $sudahLike ? 'disabled' : '' }}>
            <svg id="icon-like" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="{{ $sudahLike ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span id="jumlah-like">{{ $artikel->likes }}</span> likes
        </button>
    </div>

    <img src="{{ str_contains($artikel->gambar, '/') ? asset('storage/' . $artikel->gambar) : asset('images/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-80 object-cover rounded-lg mb-8">

    <div class="prose max-w-none text-gray-600 leading-relaxed">
        {!! $artikel->isi !!}
    </div>
</section>

<script>
    document.getElementById('btn-like')?.addEventListener('click', function () {
        const btn = this;
        const artikelId = btn.dataset.artikelId;

        fetch(`/artikel/${artikelId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('jumlah-like').textContent = data.likes;
            document.getElementById('icon-like').setAttribute('fill', 'currentColor');
            btn.classList.remove('text-gray-400', 'hover:text-danger');
            btn.classList.add('text-danger');
            btn.disabled = true;
        });
    });
</script>

@endsection