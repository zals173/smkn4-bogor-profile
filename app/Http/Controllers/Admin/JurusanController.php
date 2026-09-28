<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');

        $jurusan = Jurusan::when($cari, function ($query) use ($cari) {
            $query->where('nama', 'like', "%{$cari}%")
                  ->orWhere('kode', 'like', "%{$cari}%");
        })->orderBy('nama')->get();

        return view('admin.jurusan.index', compact('jurusan', 'cari'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:jurusans,kode',
            'nama' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'kompetensi' => 'nullable|string',
            'prospek' => 'nullable|string',
            'logo' => 'nullable|image|max:10240',
        ]);

        $validated['slug'] = Str::slug($validated['kode']);
        $validated['deskripsi'] = $validated['deskripsi'] ? explode("\n", trim($validated['deskripsi'])) : [];
        $validated['kompetensi'] = $validated['kompetensi'] ? array_map('trim', explode(',', $validated['kompetensi'])) : [];
        $validated['prospek'] = $validated['prospek'] ? array_map('trim', explode(',', $validated['prospek'])) : [];

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('jurusan', 'public');
            $validated['logo'] = $path;
        }

        Jurusan::create($validated);

        return redirect()->route('admin.jurusan.index')->with('success', 'Program keahlian berhasil ditambahkan.');
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:jurusans,kode,' . $jurusan->id,
            'nama' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'kompetensi' => 'nullable|string',
            'prospek' => 'nullable|string',
            'logo' => 'nullable|image|max:10240',
        ]);

        $validated['slug'] = Str::slug($validated['kode']);
        $validated['deskripsi'] = $validated['deskripsi'] ? explode("\n", trim($validated['deskripsi'])) : [];
        $validated['kompetensi'] = $validated['kompetensi'] ? array_map('trim', explode(',', $validated['kompetensi'])) : [];
        $validated['prospek'] = $validated['prospek'] ? array_map('trim', explode(',', $validated['prospek'])) : [];

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('jurusan', 'public');
            $validated['logo'] = $path;
        }

        $jurusan->update($validated);

        return redirect()->route('admin.jurusan.index')->with('success', 'Program keahlian berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Program keahlian berhasil dihapus.');
    }
}