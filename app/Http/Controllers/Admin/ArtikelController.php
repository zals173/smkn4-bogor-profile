<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');

        $artikel = Artikel::when($cari, function ($query) use ($cari) {
            $query->where('judul', 'like', "%{$cari}%");
        })->latest()->get();

        return view('admin.artikel.index', compact('artikel', 'cari'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Prestasi,Kegiatan,Pengumuman',
            'ringkasan' => 'nullable|string',
            'isi' => 'nullable|string',
            'status' => 'required|in:draft,publish',
            'gambar' => 'nullable|image|max:10240',
        ]);

        $validated['slug'] = $this->buatSlugUnik($validated['judul']);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Prestasi,Kegiatan,Pengumuman',
            'ringkasan' => 'nullable|string',
            'isi' => 'nullable|string',
            'status' => 'required|in:draft,publish',
            'gambar' => 'nullable|image|max:10240',
        ]);

        if ($validated['judul'] !== $artikel->judul) {
            $validated['slug'] = $this->buatSlugUnik($validated['judul'], $artikel->id);
        }

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    private function buatSlugUnik(string $judul, ?int $ignoreId = null): string
    {
        $slug = Str::slug($judul);
        $slugAsli = $slug;
        $i = 2;

        while (Artikel::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $slugAsli . '-' . $i++;
        }

        return $slug;
    }
}