@extends('layouts.admin')

@section('title', 'Manajemen Artikel - Admin')
@section('page-title', 'Artikel')

@section('content')

<div class="flex justify-between items-start mb-6 flex-wrap gap-4">
    <div>
        <h2 class="text-xl font-bold text-navy">Manajemen Artikel</h2>
        <p class="text-sm text-gray-500">Kelola artikel, berita, dan pengumuman sekolah.</p>
    </div>
    <button type="button" onclick="bukaModalTambah()" class="bg-gold text-navy font-semibold text-sm px-5 py-2.5 rounded-lg flex items-center gap-2 hover:opacity-90 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Artikel
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

<div class="bg-white rounded-lg shadow-sm">
    <div class="flex justify-between items-center p-5 border-b border-gray-100">
        <h3 class="font-semibold text-navy">Daftar Artikel</h3>
        <form method="GET" action="{{ route('admin.artikel.index') }}" class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7" />
                <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
            </svg>
            <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari artikel..."
                   class="border border-gray-300 rounded-lg pl-9 pr-4 py-2 text-sm w-56 focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3 font-semibold">Gambar</th>
                    <th class="text-left px-5 py-3 font-semibold">Judul</th>
                    <th class="text-left px-5 py-3 font-semibold">Kategori</th>
                    <th class="text-left px-5 py-3 font-semibold">Status</th>
                    <th class="text-left px-5 py-3 font-semibold">Views</th>
                    <th class="text-left px-5 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikel as $item)
                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition">
                        <td class="px-5 py-3">
                            <div class="bg-navy/5 rounded h-12 w-16 overflow-hidden">
                                @if ($item->gambar)
                                    <img src="{{ str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('images/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover">
                                @endif
                            </div>
                        </td>
                        <td class="px-5 py-3 font-medium text-navy max-w-xs">{{ $item->judul }}</td>
                        <td class="px-5 py-3">
                            <span class="{{ $item->kategori === 'Prestasi' ? 'bg-success/10 text-success' : ($item->kategori === 'Kegiatan' ? 'bg-blue-100 text-blue-600' : 'bg-danger/10 text-danger') }} text-xs font-semibold px-2.5 py-1 rounded">{{ $item->kategori }}</span>
                        </td>
                        <td class="px-5 py-3">
                            <span class="{{ $item->status === 'publish' ? 'bg-success/10 text-success' : 'bg-gray-100 text-gray-500' }} text-xs font-semibold px-2.5 py-1 rounded uppercase">{{ $item->status }}</span>
                        </td>
                        <td class="px-5 py-3 text-gray-500">{{ $item->views }}</td>
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-3">
                                <button type="button" onclick='bukaModalEdit(@json($item))' class="text-navy hover:text-gold transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="bukaModalHapus({{ $item->id }}, '{{ $item->judul }}')" class="text-danger hover:opacity-70 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-gray-400">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-5 py-3 border-t border-gray-100 text-xs text-gray-400">
        Menampilkan {{ count($artikel) }} dari {{ count($artikel) }} entri
    </div>
</div>

{{-- MODAL TAMBAH/EDIT --}}
<div id="modal-form" class="hidden fixed inset-0 bg-black/50 z-[100] items-center justify-center px-4 py-8">
    <div class="bg-white rounded-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
            <h3 id="modal-title" class="font-bold text-navy">Tambah Artikel</h3>
            <button type="button" onclick="tutupModal()" class="text-gray-400 hover:text-navy transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="form-artikel" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div id="method-field"></div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Judul Artikel</label>
                <input type="text" name="judul" id="input-judul" required
                       class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kategori</label>
                    <select name="kategori" id="input-kategori" required
                            class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
                        <option value="Prestasi">Prestasi</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Pengumuman">Pengumuman</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Status</label>
                    <select name="status" id="input-status" required
                            class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Ringkasan</label>
                <textarea name="ringkasan" id="input-ringkasan" rows="2"
                          class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy resize-none"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Isi Artikel</label>
                <textarea name="isi" id="input-isi" rows="8"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Gambar Sampul</label>
                <input type="file" name="gambar" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-navy/30 focus:border-navy">
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
        <h3 class="font-bold text-navy mb-2">Hapus Artikel?</h3>
        <p id="hapus-teks" class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.</p>
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
    function initTinyMCE() {
        tinymce.init({
            selector: '#input-isi',
            height: 300,
            menubar: false,
            plugins: 'lists link image',
            toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link | removeformat',
            branding: false,
        });
    }

    function bukaModalTambah() {
        document.getElementById('modal-title').textContent = 'Tambah Artikel';
        document.getElementById('form-artikel').action = "{{ route('admin.artikel.store') }}";
        document.getElementById('method-field').innerHTML = '';
        document.getElementById('form-artikel').reset();
        document.getElementById('modal-form').classList.remove('hidden');
        document.getElementById('modal-form').classList.add('flex');
        initTinyMCE();
    }

    function bukaModalEdit(item) {
        document.getElementById('modal-title').textContent = 'Edit Artikel';
        document.getElementById('form-artikel').action = `/admin/artikel/${item.id}`;
        document.getElementById('method-field').innerHTML = '@method('PUT')';
        document.getElementById('input-judul').value = item.judul ?? '';
        document.getElementById('input-kategori').value = item.kategori ?? 'Prestasi';
        document.getElementById('input-status').value = item.status ?? 'draft';
        document.getElementById('input-ringkasan').value = item.ringkasan ?? '';
        document.getElementById('input-isi').value = item.isi ?? '';
        document.getElementById('modal-form').classList.remove('hidden');
        document.getElementById('modal-form').classList.add('flex');

        initTinyMCE();
        setTimeout(() => {
            if (tinymce.get('input-isi')) {
                tinymce.get('input-isi').setContent(item.isi ?? '');
            }
        }, 300);
    }

    function tutupModal() {
        document.getElementById('modal-form').classList.add('hidden');
        document.getElementById('modal-form').classList.remove('flex');
        tinymce.remove('#input-isi');
    }

    function bukaModalHapus(id, judul) {
        document.getElementById('hapus-teks').textContent = `Apakah Anda yakin ingin menghapus "${judul}"? Tindakan ini tidak dapat dibatalkan.`;
        document.getElementById('form-hapus').action = `/admin/artikel/${id}`;
        document.getElementById('modal-hapus').classList.remove('hidden');
        document.getElementById('modal-hapus').classList.add('flex');
    }

    function tutupModalHapus() {
        document.getElementById('modal-hapus').classList.add('hidden');
        document.getElementById('modal-hapus').classList.remove('flex');
    }

    document.getElementById('form-artikel').addEventListener('submit', function () {
        if (tinymce.get('input-isi')) {
            tinymce.triggerSave();
        }
    });

    setTimeout(() => {
        document.getElementById('alert-success')?.remove();
    }, 4000);
</script>

@endsection