<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMK Negeri 4 Bogor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen grid md:grid-cols-2">

        {{-- KIRI: FORM LOGIN --}}
        <div class="flex flex-col justify-center px-8 md:px-16 py-12">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-navy transition mb-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Beranda
            </a>

            <div class="max-w-sm mx-auto w-full">
                <div class="bg-navy rounded-xl h-12 w-12 flex items-center justify-center mb-6 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-navy mb-2 text-center">Masuk sebagai Admin</h1>
                <p class="text-sm text-gray-500 mb-8 text-center">Masukkan kredensial Anda untuk melanjutkan</p>
                @if ($errors->any())
                <div class="bg-danger/10 border border-danger/30 text-danger text-sm rounded-lg px-4 py-3 mb-5">
                    {{ $errors->first() }}
                </div>
                @endif

                <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Alamat Email</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input type="email" id="email" name="email" placeholder="admin@sekolah.edu"
                                class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Kata Sandi</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="w-full border border-gray-300 rounded-lg pl-10 pr-10 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">

                            <button type="button" id="toggle-password" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-navy transition">
                                {{-- Default (password hidden): tampilkan mata DICORET --}}
                                <svg id="icon-eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.774 3.162 10.066 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                                {{-- Saat diklik & password tampil: ganti jadi mata POLOS --}}
                                <svg id="icon-eye-open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-navy focus:ring-navy/30">
                            Ingat saya
                        </label>
                        <button type="button" onclick="document.getElementById('modal-lupa-sandi').classList.remove('hidden'); document.getElementById('modal-lupa-sandi').classList.add('flex');" class="text-gold font-medium hover:underline">Lupa kata sandi?</button>
                    </div>

                    <button type="submit" class="w-full bg-gold text-navy font-semibold py-3 rounded-lg hover:opacity-90 transition">
                        MASUK
                    </button>
                </form>
            </div>
        </div>

        {{-- KANAN: PANEL POLOS --}}
        <div class="hidden md:flex bg-navy items-center justify-center">
            <div class="max-w-sm px-10 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Selamat Datang, Admin!</h2>
                <p class="text-white/70 text-sm leading-relaxed">
                    Kelola data sekolah, program, artikel, dan galeri dari satu tempat.
                </p>
            </div>
        </div>

        {{-- MODAL LUPA KATA SANDI --}}
        <div id="modal-lupa-sandi" class="hidden fixed inset-0 bg-black/50 z-[100] items-center justify-center px-4">
            <div class="bg-white rounded-xl w-full max-w-sm p-6 text-center">
                <div class="bg-navy/10 rounded-full h-14 w-14 flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7zM12 11V9m0 4h.01" />
                    </svg>
                </div>
                <h3 class="font-bold text-navy mb-2">Lupa Kata Sandi?</h3>
                <p class="text-sm text-gray-500 mb-6">
                    Untuk keamanan sistem, reset kata sandi admin hanya dapat dilakukan oleh pengelola sistem sekolah. Silakan hubungi pihak IT/Developer melalui WhatsApp di bawah ini.
                </p>
                <div class="flex gap-3">
                    <button type="button" onclick="document.getElementById('modal-lupa-sandi').classList.add('hidden'); document.getElementById('modal-lupa-sandi').classList.remove('flex');" class="flex-1 border border-gray-300 text-gray-600 font-semibold py-2.5 rounded-lg hover:bg-gray-50 transition">
                        Tutup
                    </button>
                    <a href="https://wa.me/62895330041067" target="_blank" rel="noopener" class="flex-1 bg-success text-white font-semibold py-2.5 rounded-lg hover:opacity-90 transition text-center">
                        Hubungi IT
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-password')?.addEventListener('click', function() {
            const input = document.getElementById('password');
            const iconOpen = document.getElementById('icon-eye-open');
            const iconClosed = document.getElementById('icon-eye-closed');

            const willShow = input.type === 'password';
            input.type = willShow ? 'text' : 'password';

            iconOpen.classList.toggle('hidden', !willShow);
            iconClosed.classList.toggle('hidden', willShow);
        });
    </script>

</body>

</html>