<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $profil = [
            'SMK Negeri 4 Kota Bogor adalah sekolah menengah kejuruan negeri yang berlokasi di Kecamatan Bogor Selatan, Kota Bogor, Jawa Barat.',
            'Sekolah ini didirikan pada tahun 2008 dan mulai beroperasi pada tahun 2009 dengan fokus pendidikan vokasi di bidang teknologi, rekayasa, serta teknologi informasi dan komunikasi.',
            'Saat ini, SMK Negeri 4 Kota Bogor telah berstatus sebagai SMK Pusat Keunggulan (PK) dan memegang akreditasi A.',
        ];

        $visi = 'Terwujudnya sekolah yang tangguh dalam imtaq, terampil, mandiri, berbasis Teknologi Informasi dan Komunikasi, dan berwawasan lingkungan.';

        $misi = [
            'Meningkatkan keimanan dan ketakwaan (imtaq) seluruh warga sekolah.',
            'Menyelenggarakan pelatihan vokasi yang membuat siswa terampil dan mandiri di bidang kejuruan otomotif, pengelasan, serta teknologi informasi (PPLG & TJKT).',
            'Menerapkan pembelajaran berbasis teknologi informasi.',
            'Membangun budaya sekolah yang peduli dan berwawasan lingkungan.',
        ];

        $ekskul = Ekstrakurikuler::orderBy('id')->get();

        return view('tentang.index', compact('profil', 'visi', 'misi', 'ekskul'));
    }
}