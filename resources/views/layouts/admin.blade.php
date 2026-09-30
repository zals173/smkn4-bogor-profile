<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - SMK Negeri 4 Bogor')</title>
    <link rel="icon" type="image/png" href="/images/logo-smk4.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="font-sans antialiased bg-gray-50">

@php
    $notifikasiBelumDibaca = auth()->user()->unreadNotifications;
    $semuaNotifikasi = auth()->user()->notifications()->latest()->take(8)->get();
@endphp

<div class="flex min-h-screen">

    @include('partials.admin-sidebar')

    <div class="flex-1 flex flex-col min-w-0">

        {{-- TOP BAR --}}
        <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 sticky top-0 z-30">
            <div>
                <h1 class="font-semibold text-navy">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-4">

                {{-- NOTIFIKASI --}}
                <div class="relative">
                    <button type="button" id="notif-btn" class="relative text-gray-400 hover:text-navy transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        @if ($notifikasiBelumDibaca->count() > 0)
                            <span class="absolute -top-0.5 -right-0.5 h-2 w-2 bg-danger rounded-full"></span>
                        @endif
                    </button>

                    <div id="notif-menu" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-40 border border-gray-100">
                        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                            <span class="text-sm font-semibold text-navy">Notifikasi</span>
                            @if ($notifikasiBelumDibaca->count() > 0)
                                <form method="POST" action="{{ route('admin.notifikasi.baca-semua') }}">
                                    @csrf
                                    <button type="submit" class="text-xs text-gold font-medium hover:underline">Tandai semua dibaca</button>
                                </form>
                            @endif
                        </div>

                        <div class="max-h-80 overflow-y-auto">
                            @forelse ($semuaNotifikasi as $notif)
                                <form method="POST" action="{{ route('admin.notifikasi.baca', $notif->id) }}">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ $notif->data['url'] ?? '#' }}">
                                    <button type="submit" class="w-full text-left flex gap-3 px-4 py-3 hover:bg-gray-50 transition border-b border-gray-50 last:border-b-0 {{ $notif->read_at ? '' : 'bg-gold/5' }}">
                                        <span class="mt-1 h-2 w-2 rounded-full shrink-0 {{ $notif->read_at ? 'bg-gray-300' : 'bg-gold' }}"></span>
                                        <span class="min-w-0">
                                            <span class="block text-sm font-medium text-gray-800 truncate">{{ $notif->data['judul'] }}</span>
                                            <span class="block text-xs text-gray-500 truncate">{{ $notif->data['pesan'] }}</span>
                                            <span class="block text-[11px] text-gray-400 mt-0.5">{{ $notif->created_at->diffForHumans() }}</span>
                                        </span>
                                    </button>
                                </form>
                            @empty
                                <div class="px-4 py-6 text-center text-sm text-gray-400">Belum ada notifikasi</div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2.5">
                    @if (auth()->user()->foto)
                        <img src="{{ asset('storage/'.auth()->user()->foto) }}" class="h-8 w-8 rounded-full object-cover">
                    @else
                        <div class="bg-navy text-gold text-xs font-bold h-8 w-8 rounded-full flex items-center justify-center">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    @endif
                    <span class="text-sm font-medium text-gray-700 hidden sm:block">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </header>

        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>
</div>

{{-- TOAST NOTIFIKASI SUKSES --}}
@if (session('success'))
    <div id="toast-sukses" class="fixed top-6 right-6 z-50 w-80 bg-white rounded-lg shadow-xl border border-gray-100 p-4 flex gap-3">
        <div class="h-8 w-8 rounded-full bg-success/10 text-success flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-sm font-semibold text-navy">Berhasil!</p>
            <p class="text-xs text-gray-500 mt-0.5">{{ session('success') }}</p>
        </div>
        <button type="button" onclick="document.getElementById('toast-sukses').remove()" class="text-gray-300 hover:text-gray-500 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('toast-sukses')?.remove();
        }, 4000);
    </script>
@endif

<script>
    document.getElementById('notif-btn')?.addEventListener('click', function (e) {
        e.stopPropagation();
        document.getElementById('notif-menu').classList.toggle('hidden');
    });
    document.addEventListener('click', function () {
        document.getElementById('notif-menu')?.classList.add('hidden');
    });
</script>

</body>
</html>