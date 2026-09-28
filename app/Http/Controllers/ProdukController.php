<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('kategori')->orderBy('nama')->get();

        return view('produk.index', compact('produk'));
    }
}