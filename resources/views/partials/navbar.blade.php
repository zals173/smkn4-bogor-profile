<div class="bg-navy text-white text-xs py-2 hidden md:block">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
        <div class="flex gap-6">
            <span class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Jl. Raya Tajur, Kp. Buntar RT.02/RW.08
            </span>
            <span class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.517l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                (0251) 754738
            </span>
            <span class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                smkn4@smkn4bogor.sch.id
            </span>
        </div>

        <a href="{{ route('admin.login') }}" class="hover:text-gold flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Login Admin
        </a>
    </div>
</div>

<nav class="bg-navy sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">
        <a href="{{ route('beranda') }}" class="flex items-center gap-3 text-white font-semibold text-lg">
            <img src="/images/logo-smk4.png" alt="Logo SMK Negeri 4 Bogor" class="h-9 w-9">
            SMK NEGERI 4 KOTA BOGOR
        </a>

        <ul class="hidden lg:flex items-center gap-8 text-sm font-medium text-white">
            <li>
                <a href="{{ route('beranda') }}" data-nav="beranda"
                   class="nav-link hover:text-gold pb-1">
                    BERANDA
                </a>
            </li>
            <li>
                <a href="{{ route('tentang') }}" data-nav="tentang"
                   class="nav-link hover:text-gold pb-1 {{ request()->routeIs('tentang') ? 'text-gold border-b-2 border-gold' : '' }}">
                    TENTANG
                </a>
            </li>
            <li>
                <a href="{{ route('jurusan.index') }}" data-nav="jurusan"
                   class="nav-link hover:text-gold pb-1 {{ request()->routeIs('jurusan.*') ? 'text-gold border-b-2 border-gold' : '' }}">
                    JURUSAN
                </a>
            </li>
            <li>
                <a href="{{ route('artikel.index') }}" data-nav="artikel"
                   class="nav-link hover:text-gold pb-1 {{ request()->routeIs('artikel.*') ? 'text-gold border-b-2 border-gold' : '' }}">
                    ARTIKEL
                </a>
            </li>
            <li>
                <a href="{{ route('galeri.index') }}" data-nav="galeri"
                   class="nav-link hover:text-gold pb-1 {{ request()->routeIs('galeri.*') ? 'text-gold border-b-2 border-gold' : '' }}">
                    GALERI
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}" data-nav="produk"
                   class="nav-link hover:text-gold pb-1 {{ request()->routeIs('produk.*') ? 'text-gold border-b-2 border-gold' : '' }}">
                    PRODUK
                </a>
            </li>
            <li>
                <a href="{{ request()->routeIs('beranda') ? '#kontak' : route('beranda').'#kontak' }}" data-nav="kontak"
                   class="nav-link hover:text-gold pb-1">
                    KONTAK
                </a>
            </li>
        </ul>

        <button class="lg:hidden text-white" id="mobile-menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</nav>