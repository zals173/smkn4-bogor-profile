<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');

        $galeri = Galeri::when($cari, function ($query) use ($cari) {
            $query->where('judul', 'like', "%{$cari}%");
        })->latest()->get();

        return view('admin.galeri.index', compact('galeri', 'cari'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Prestasi,Kegiatan,Fasilitas',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $validated['gambar'] = $request->file('gambar')->store('galeri', 'public');

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Prestasi,Kegiatan,Fasilitas',
            'gambar' => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}
