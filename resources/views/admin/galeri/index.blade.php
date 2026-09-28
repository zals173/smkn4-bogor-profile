@extends('layouts.admin')

@section('title', 'Manajemen Galeri - Admin')
@section('page-title', 'Galeri')

@section('content')

<div class="flex justify-between items-start mb-6 flex-wrap gap-4">
    <div>
        <h2 class="text-xl font-bold text-navy">Manajemen Galeri</h2>
        <p class="text-sm text-gray-500">Kelola foto kegiatan, fasilitas, dan prestasi sekolah.</p>
    </div>
    <button type="button" onclick="bukaModalTambah()" class="bg-gold text-navy font-semibold text-sm px-5 py-2.5 rounded-lg flex items-center gap-2 hover:opacity-90 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Foto
    </button>
</div>

@if (session('success'))
    <div id="alert-success" class="bg-success/10 border border-success/30 text-success text-sm rounded-lg px-4 py-3 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-danger/10 border border-danger/30 text-danger text-sm rounded-lg px-4 py-3 mb-6">
        <p class="font-semibold mb-1">Periksa kembali data yang diisi:</p>
        <ul class="list-disc list-inside space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flex justify-between items-center mb-5 flex-wrap gap-3">
    <h3 class="font-semibold text-navy">Daftar Foto ({{ count($galeri) }})</h3>
    <form method="GET" action="{{ route('admin.galeri.index') }}" class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="7" />
            <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
        </svg>
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari foto..."
               class="border border-gray-300 rounded-lg pl-9 pr-4 py-2 text-sm w-56 bg-white focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
    </form>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse ($galeri as $item)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
            <div class="relative">
                <span class="absolute top-2 left-2 {{ $item->kategori === 'Prestasi' ? 'bg-success' : ($item->kategori === 'Kegiatan' ? 'bg-blue-600' : 'bg-gold') }} text-white text-[10px] font-bold px-2 py-1 rounded uppercase z-10">
                    {{ $item->kategori }}
                </span>
                <img src="{{ str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('images/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-32 object-cover">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100">
                    <button type="button" onclick='bukaModalEdit(@json($item))' class="bg-white text-navy h-8 w-8 rounded-full flex items-center justify-center hover:bg-gold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                    <button type="button" onclick="bukaModalHapus({{ $item->id }}, '{{ $item->judul }}')" class="bg-white text-danger h-8 w-8 rounded-full flex items-center justify-center hover:bg-danger hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-3">
                <p class="text-xs font-medium text-navy line-clamp-2">{{ $item->judul }}</p>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-16 text-gray-400">
            Belum ada foto galeri.
        </div>
    @endforelse
</div>

{{-- MODAL TAMBAH/EDIT --}}
<div id="modal-form" class="hidden fixed inset-0 bg-black/50 z-[100] items-center justify-center px-4 py-8">
    <div class="bg-white rounded-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
            <h3 id="modal-title" class="font-bold text-navy">Tambah Foto</h3>
            <button type="button" onclick="tutupModal()" class="text-gray-400 hover:text-navy transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="form-galeri" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div id="method-field"></div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Judul Foto</label>
                <input type="text" name="judul" id="input-judul" required
                       class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kategori</label>
                <select name="kategori" id="input-kategori" required
                        class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
                    <option value="Prestasi">Prestasi</option>
                    <option value="Kegiatan">Kegiatan</option>
                    <option value="Fasilitas">Fasilitas</option>
                </select>
            </div>

            <div>
                <label id="label-gambar" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Foto</label>
                <input type="file" name="gambar" id="input-gambar" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
                <p id="preview-info" class="text-xs text-gray-400 mt-1 hidden">Kosongkan jika tidak ingin mengganti foto.</p>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="tutupModal()" class="flex-1 border border-gray-300 text-gray-600 font-semibold py-2.5 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-gold text-navy font-semibold py-2.5 rounded-lg hover:opacity-90 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS --}}
<div id="modal-hapus" class="hidden fixed inset-0 bg-black/50 z-[100] items-center justify-center px-4">
    <div class="bg-white rounded-xl w-full max-w-sm p-6 text-center">
        <div class="bg-danger/10 rounded-full h-14 w-14 flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
        </div>
        <h3 class="font-bold text-navy mb-2">Hapus Foto?</h3>
        <p id="hapus-teks" class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus foto ini? Tindakan ini tidak dapat dibatalkan.</p>
        <form id="form-hapus" method="POST" class="flex gap-3">
            @csrf
            @method('DELETE')
            <button type="button" onclick="tutupModalHapus()" class="flex-1 border border-gray-300 text-gray-600 font-semibold py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </button>
            <button type="submit" class="flex-1 bg-danger text-white font-semibold py-2.5 rounded-lg hover:opacity-90 transition">
                Hapus
            </button>
        </form>
    </div>
</div>

<script>
    function bukaModalTambah() {
        document.getElementById('modal-title').textContent = 'Tambah Foto';
        document.getElementById('form-galeri').action = "{{ route('admin.galeri.store') }}";
        document.getElementById('method-field').innerHTML = '';
        document.getElementById('form-galeri').reset();
        document.getElementById('input-gambar').required = true;
        document.getElementById('preview-info').classList.add('hidden');
        document.getElementById('modal-form').classList.remove('hidden');
        document.getElementById('modal-form').classList.add('flex');
    }

    function bukaModalEdit(item) {
        document.getElementById('modal-title').textContent = 'Edit Foto';
        document.getElementById('form-galeri').action = `/admin/galeri/${item.id}`;
        document.getElementById('method-field').innerHTML = '@method('PUT')';
        document.getElementById('input-judul').value = item.judul ?? '';
        document.getElementById('input-kategori').value = item.kategori ?? 'Kegiatan';
        document.getElementById('input-gambar').required = false;
        document.getElementById('preview-info').classList.remove('hidden');
        document.getElementById('modal-form').classList.remove('hidden');
        document.getElementById('modal-form').classList.add('flex');
    }

    function tutupModal() {
        document.getElementById('modal-form').classList.add('hidden');
        document.getElementById('modal-form').classList.remove('flex');
    }

    function bukaModalHapus(id, judul) {
        document.getElementById('hapus-teks').textContent = `Apakah Anda yakin ingin menghapus "${judul}"? Tindakan ini tidak dapat dibatalkan.`;
        document.getElementById('form-hapus').action = `/admin/galeri/${id}`;
        document.getElementById('modal-hapus').classList.remove('hidden');
        document.getElementById('modal-hapus').classList.add('flex');
    }

    function tutupModalHapus() {
        document.getElementById('modal-hapus').classList.add('hidden');
        document.getElementById('modal-hapus').classList.remove('flex');
    }

    setTimeout(() => {
        document.getElementById('alert-success')?.remove();
    }, 4000);
</script>

@endsection