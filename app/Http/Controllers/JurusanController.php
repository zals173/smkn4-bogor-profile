<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::orderBy('nama')->get();

        return view('jurusan.index', compact('jurusan'));
    }

    public function show($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)->firstOrFail();

        return view('jurusan.show', compact('jurusan'));
    }
}