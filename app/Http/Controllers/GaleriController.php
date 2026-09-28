<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori', 'Semua');
        $cari = $request->get('cari');

        $galeri = Galeri::when($kategori !== 'Semua', fn ($q) => $q->where('kategori', $kategori))
            ->when($cari, fn ($q) => $q->where('judul', 'like', "%{$cari}%"))
            ->latest()
            ->get();

        return view('galeri.index', [
            'galeri' => $galeri,
            'kategoriAktif' => $kategori,
            'cari' => $cari,
        ]);
    }
}