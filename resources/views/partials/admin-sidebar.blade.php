<aside class="bg-navy w-64 shrink-0 flex flex-col h-screen sticky top-0">

    <div class="h-16 flex items-center px-6 border-b border-white/10">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 text-white font-bold">
            <div class="bg-gold rounded h-8 w-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0118 20.945 12.083 12.083 0 016 9.578L12 14zm0 0v6.5" />
                </svg>
            </div>
            SISFO K4
        </a>
    </div>

    <div class="px-4 pt-5 relative">
        <button type="button" id="tambah-konten-btn" class="w-full bg-gold text-navy font-semibold text-sm py-2.5 rounded-lg flex items-center justify-center gap-2 hover:opacity-90 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Konten
        </button>

        <div id="tambah-konten-menu" class="hidden absolute left-4 right-4 mt-2 bg-white rounded-lg shadow-xl overflow-hidden z-40">
            <a href="{{ route('admin.jurusan.index', ['tambah' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0118 20.945 12.083 12.083 0 016 9.578L12 14zm0 0v6.5" />
                </svg>
                Program Keahlian
            </a>
            <a href="{{ route('admin.artikel.index', ['tambah' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition border-t border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Artikel
            </a>
            <a href="{{ route('admin.galeri.index', ['tambah' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition border-t border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Foto Galeri
            </a>
            <a href="{{ route('admin.produk.index', ['tambah' => 1]) }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition border-t border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Produk
            </a>
        </div>
    </div>

    <nav class="flex-1 px-4 pt-6 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Beranda
        </a>
        <a href="{{ route('admin.jurusan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.jurusan.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0118 20.945 12.083 12.083 0 016 9.578L12 14zm0 0v6.5" />
            </svg>
            Jurusan
        </a>
        <a href="{{ route('admin.artikel.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.artikel.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Artikel
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.galeri.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Galeri
        </a>
        <a href="{{ route('admin.produk.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.produk.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            Produk
        </a>
    </nav>

    <div class="px-4 pb-6 pt-4 border-t border-white/10 space-y-1">
        <a href="{{ route('admin.profil.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.profil.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Profil
        </a>

        <button type="button" id="logout-btn" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-danger hover:bg-danger/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Keluar
        </button>

        <form method="POST" action="{{ route('admin.logout') }}" id="form-logout" class="hidden">
            @csrf
        </form>
    </div>

</aside>

{{-- MODAL KONFIRMASI KELUAR --}}
<div id="modal-logout" class="hidden fixed inset-0 z-50 items-center justify-center">
    <div class="absolute inset-0 bg-black/40" id="modal-logout-overlay"></div>
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-sm mx-4 p-6 text-center">
        <div class="mx-auto h-12 w-12 rounded-full bg-navy text-gold flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </div>
        <h3 class="font-semibold text-navy">Keluar dari Akun?</h3>
        <p class="text-sm text-gray-500 mt-1.5">Anda akan keluar dari panel admin. Pastikan semua perubahan telah disimpan.</p>
        <div class="flex gap-3 mt-5">
            <button type="button" id="logout-batal" class="flex-1 border border-gray-200 text-gray-600 font-medium text-sm py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </button>
            <button type="button" id="logout-ya" class="flex-1 bg-navy text-white font-medium text-sm py-2.5 rounded-lg hover:opacity-90 transition">
                Ya, Keluar
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('tambah-konten-btn')?.addEventListener('click', function (e) {
        e.stopPropagation();
        document.getElementById('tambah-konten-menu').classList.toggle('hidden');
    });
    document.addEventListener('click', function () {
        document.getElementById('tambah-konten-menu')?.classList.add('hidden');
    });

    // Modal konfirmasi keluar
    const modalLogout = document.getElementById('modal-logout');
    function bukaModalLogout() {
        modalLogout.classList.remove('hidden');
        modalLogout.classList.add('flex');
    }
    function tutupModalLogout() {
        modalLogout.classList.add('hidden');
        modalLogout.classList.remove('flex');
    }
    document.getElementById('logout-btn')?.addEventListener('click', bukaModalLogout);
    document.getElementById('logout-batal')?.addEventListener('click', tutupModalLogout);
    document.getElementById('modal-logout-overlay')?.addEventListener('click', tutupModalLogout);
    document.getElementById('logout-ya')?.addEventListener('click', function () {
        document.getElementById('form-logout').submit();
    });

    // Kalau dibuka dari menu "Tambah Konten" (?tambah=1), langsung buka modal tambah
    window.addEventListener('DOMContentLoaded', function () {
        const params = new URLSearchParams(window.location.search);
        if (params.get('tambah') && typeof bukaModalTambah === 'function') {
            bukaModalTambah();
            history.replaceState(null, '', window.location.pathname);
        }
    });
</script>