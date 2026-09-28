<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Jurusan;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            $this->hitungStat('Total Program', Jurusan::class, 'book', 'admin.jurusan.index'),
            $this->hitungStat('Total Artikel', Artikel::class, 'document', 'admin.artikel.index'),
            $this->hitungStat('Foto Galeri', Galeri::class, 'image', 'admin.galeri.index'),
            $this->hitungStat('Total Produk', Produk::class, 'box', 'admin.produk.index'),
        ];

        // Tren konten: jumlah artikel + foto galeri yang dibuat per bulan (6 bulan terakhir)
        $trenKonten = collect(range(5, 0))->map(function ($mundur) {
            $bulan = now()->startOfMonth()->subMonths($mundur);

            $jumlah = collect([Artikel::class, Galeri::class])->sum(
                fn ($model) => $model::whereYear('created_at', $bulan->year)
                    ->whereMonth('created_at', $bulan->month)
                    ->count()
            );

            return [
                'bulan' => $bulan->locale('id')->translatedFormat('M'),
                'jumlah' => $jumlah,
            ];
        })->values()->all();

        $artikelPopuler = Artikel::where('status', 'publish')
            ->orderByDesc('views')
            ->take(3)
            ->get();

        // Aktivitas terbaru: gabungan data yang terakhir ditambah/diubah dari 4 modul
        $aktivitasTerbaru = collect()
            ->merge(Artikel::latest('updated_at')->take(5)->get()->map(fn ($m) => $this->buatAktivitas($m, 'Artikel', $m->judul)))
            ->merge(Galeri::latest('updated_at')->take(5)->get()->map(fn ($m) => $this->buatAktivitas($m, 'Foto galeri', $m->judul)))
            ->merge(Jurusan::latest('updated_at')->take(5)->get()->map(fn ($m) => $this->buatAktivitas($m, 'Program keahlian', $m->nama)))
            ->merge(Produk::latest('updated_at')->take(5)->get()->map(fn ($m) => $this->buatAktivitas($m, 'Produk', $m->nama)))
            ->sortByDesc(fn ($a) => $a['waktu']->timestamp)
            ->take(5)
            ->values();

        $galeriTerbaru = Galeri::latest()->take(6)->get();

        return view('admin.dashboard.index', compact(
            'stats', 'trenKonten', 'artikelPopuler', 'aktivitasTerbaru', 'galeriTerbaru'
        ));
    }

    private function hitungStat(string $label, string $model, string $icon, string $route): array
    {
        $bulanIni = $model::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        return [
            'label' => $label,
            'nilai' => $model::count(),
            'info' => $bulanIni > 0 ? "+{$bulanIni} bln ini" : 'Tetap',
            'trend' => $bulanIni > 0 ? 'up' : 'flat',
            'icon' => $icon,
            'route' => $route,
        ];
    }

    private function buatAktivitas($model, string $jenis, string $judul): array
    {
        $baru = abs($model->created_at->diffInMinutes($model->updated_at)) < 1;

        return [
            'jenis' => $jenis,
            'judul' => $judul,
            'aksi' => $baru ? 'ditambahkan' : 'diperbarui',
            'waktu' => $model->updated_at,
        ];
    }
}