<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori', 'Semua');
        $cari = $request->get('cari');

        $artikel = Artikel::where('status', 'publish')
            ->when($kategori !== 'Semua', fn($q) => $q->where('kategori', $kategori))
            ->when($cari, fn($q) => $q->where('judul', 'like', "%{$cari}%"))
            ->latest()
            ->get();

        return view('artikel.index', [
            'artikel' => $artikel,
            'kategoriAktif' => $kategori,
            'cari' => $cari,
        ]);
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('status', 'publish')->firstOrFail();
        $artikel->increment('views');

        $sudahLike = session()->has('liked_artikel_' . $artikel->id);

        return view('artikel.show', compact('artikel', 'sudahLike'));
    }

    public function like(Artikel $artikel)
    {
        $sessionKey = 'liked_artikel_' . $artikel->id;

        if (!session()->has($sessionKey)) {
            $artikel->increment('likes');
            session()->put($sessionKey, true);
        }

        return response()->json([
            'likes' => $artikel->fresh()->likes,
            'sudahLike' => true,
        ]);
    }
}
