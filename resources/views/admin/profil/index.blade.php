@extends('layouts.admin')

@section('title', 'Profil Admin - SMK Negeri 4 Bogor')
@section('page-title', 'Profil Admin')

@section('content')

<nav class="text-xs text-gray-400 mb-2">
    <a href="{{ route('admin.dashboard') }}" class="hover:text-navy">Beranda</a>
    <span class="mx-1">/</span>
    <span class="text-gray-600">Profil</span>
</nav>

<h1 class="text-xl font-bold text-navy">Profil Admin</h1>
<p class="text-sm text-gray-500 mb-6">Kelola informasi akun dan keamanan Anda.</p>

<form method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

        {{-- KARTU RINGKASAN PROFIL --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 flex flex-col items-center text-center">

            @if ($user->foto)
                <img src="{{ asset('storage/'.$user->foto) }}" id="preview-foto" class="h-24 w-24 rounded-full object-cover border-4 border-gold/20">
            @else
                <div id="preview-foto-fallback" class="h-24 w-24 rounded-full bg-navy text-gold flex items-center justify-center text-2xl font-bold border-4 border-gold/20">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
                <img src="" id="preview-foto" class="hidden h-24 w-24 rounded-full object-cover border-4 border-gold/20">
            @endif

            <div class="mt-3 flex items-center justify-center gap-4">
                <label for="foto" class="inline-flex items-center gap-1.5 text-gold text-xs font-semibold cursor-pointer hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ganti Foto
                </label>

                @if ($user->foto)
                    <button type="button" id="btn-hapus-foto" class="inline-flex items-center gap-1.5 text-danger text-xs font-semibold hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Foto
                    </button>
                @endif
            </div>

            <input type="file" name="foto" id="foto" accept="image/*" class="hidden">
            @error('foto')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror

            <p class="mt-3 font-semibold text-navy">{{ $user->name }}</p>
            <p class="text-xs text-gray-400">Administrator</p>

            <div class="w-full border-t border-gray-100 mt-4 pt-4 space-y-3 text-left">
                <div class="flex items-center gap-2.5 text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="truncate">{{ $user->email }}</span>
                </div>
                <div class="flex items-center gap-2.5 text-sm text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Status Akun</span>
                    <span class="ml-auto text-[11px] bg-success/10 text-success font-semibold px-2 py-0.5 rounded-full">Aktif</span>
                </div>
            </div>
        </div>

        {{-- INFORMASI AKUN --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 lg:col-span-2">
            <h2 class="text-navy font-semibold mb-5">Informasi Akun</h2>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full rounded-lg border border-gray-200 px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                    @error('name')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full rounded-lg border border-gray-200 px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                    @error('email')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="border-t border-gray-100 mt-6 pt-6">
                <h3 class="text-xs font-bold text-gray-400 tracking-wide uppercase mb-4">Ubah Kata Sandi</h3>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="relative sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Kata Sandi Saat Ini</label>
                        <input type="password" name="password_lama" id="password_lama"
                            class="w-full rounded-lg border border-gray-200 px-3.5 py-2.5 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                        <button type="button" onclick="togglePassword('password_lama')" class="absolute right-3 top-[38px] text-gray-400 hover:text-navy">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        @error('password_lama')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Kata Sandi Baru</label>
                        <input type="password" name="password_baru" id="password_baru"
                            class="w-full rounded-lg border border-gray-200 px-3.5 py-2.5 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                        <button type="button" onclick="togglePassword('password_baru')" class="absolute right-3 top-[38px] text-gray-400 hover:text-navy">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        @error('password_baru')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="password_baru_confirmation" id="password_baru_confirmation"
                            class="w-full rounded-lg border border-gray-200 px-3.5 py-2.5 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                        <button type="button" onclick="togglePassword('password_baru_confirmation')" class="absolute right-3 top-[38px] text-gray-400 hover:text-navy">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-2">Kosongkan jika tidak ingin mengubah kata sandi.</p>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-gold text-navy font-semibold text-sm px-6 py-2.5 rounded-lg hover:opacity-90 transition">
                    Simpan Perubahan
                </button>
            </div>
        </div>

    </div>
</form>

{{-- MODAL KONFIRMASI HAPUS FOTO (di luar form utama karena HTML tidak boleh nested form) --}}
@if ($user->foto)
<div id="modal-hapus-foto" class="hidden fixed inset-0 z-50 items-center justify-center">
    <div class="absolute inset-0 bg-black/40" id="modal-hapus-foto-overlay"></div>
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-sm mx-4 p-6 text-center">
        <div class="mx-auto h-12 w-12 rounded-full bg-danger/10 text-danger flex items-center justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <h3 class="font-semibold text-navy">Hapus Foto Profil?</h3>
        <p class="text-sm text-gray-500 mt-1.5">Foto profil akan dihapus dan diganti dengan inisial nama Anda.</p>

        <form method="POST" action="{{ route('admin.profil.foto.hapus') }}" class="flex gap-3 mt-5">
            @csrf
            @method('DELETE')
            <button type="button" id="hapus-foto-batal" class="flex-1 border border-gray-200 text-gray-600 font-medium text-sm py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </button>
            <button type="submit" class="flex-1 bg-danger text-white font-medium text-sm py-2.5 rounded-lg hover:opacity-90 transition">
                Ya, Hapus
            </button>
        </form>
    </div>
</div>
@endif

<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    const inputFoto = document.getElementById('foto');
    inputFoto?.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (ev) {
            const preview = document.getElementById('preview-foto');
            const fallback = document.getElementById('preview-foto-fallback');
            preview.src = ev.target.result;
            preview.classList.remove('hidden');
            fallback?.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    });

    // Modal hapus foto
    const modalHapusFoto = document.getElementById('modal-hapus-foto');
    function bukaModalHapusFoto() {
        modalHapusFoto.classList.remove('hidden');
        modalHapusFoto.classList.add('flex');
    }
    function tutupModalHapusFoto() {
        modalHapusFoto.classList.add('hidden');
        modalHapusFoto.classList.remove('flex');
    }
    document.getElementById('btn-hapus-foto')?.addEventListener('click', bukaModalHapusFoto);
    document.getElementById('hapus-foto-batal')?.addEventListener('click', tutupModalHapusFoto);
    document.getElementById('modal-hapus-foto-overlay')?.addEventListener('click', tutupModalHapusFoto);
</script>
@endsection