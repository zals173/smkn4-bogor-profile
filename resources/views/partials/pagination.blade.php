@if ($paginator->hasPages())
<nav class="flex items-center justify-center gap-2 mt-4">
    {{-- Tombol Sebelumnya --}}
    @if ($paginator->onFirstPage())
        <span class="px-3.5 py-2 text-sm text-gray-300 border border-gray-200 rounded-lg cursor-not-allowed">
            Sebelumnya
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-3.5 py-2 text-sm text-gray-600 border border-gray-200 rounded-lg hover:border-navy hover:text-navy transition">
            Sebelumnya
        </a>
    @endif

    {{-- Nomor Halaman --}}
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        @if ($page == $paginator->currentPage())
            <span class="px-3.5 py-2 text-sm font-semibold bg-navy text-white rounded-lg">
                {{ $page }}
            </span>
        @else
            <a href="{{ $url }}" class="px-3.5 py-2 text-sm text-gray-600 border border-gray-200 rounded-lg hover:border-navy hover:text-navy transition">
                {{ $page }}
            </a>
        @endif
    @endforeach

    {{-- Tombol Selanjutnya --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3.5 py-2 text-sm text-gray-600 border border-gray-200 rounded-lg hover:border-navy hover:text-navy transition">
            Selanjutnya
        </a>
    @else
        <span class="px-3.5 py-2 text-sm text-gray-300 border border-gray-200 rounded-lg cursor-not-allowed">
            Selanjutnya
        </span>
    @endif
</nav>
@endif