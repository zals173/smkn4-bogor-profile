<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\NotifikasiController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;

// ==================== HALAMAN PUBLIK ====================
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::post('/artikel/{artikel}/like', [ArtikelController::class, 'like'])->name('artikel.like');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// ==================== AUTENTIKASI ADMIN ====================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.authenticate');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ==================== HALAMAN ADMIN (WAJIB LOGIN) ====================
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/jurusan', AdminJurusanController::class)
        ->names('admin.jurusan')
        ->except(['create', 'edit', 'show']);

    Route::resource('admin/artikel', AdminArtikelController::class)
        ->names('admin.artikel')
        ->except(['create', 'edit', 'show']);

    Route::resource('admin/galeri', AdminGaleriController::class)
        ->names('admin.galeri')
        ->except(['create', 'edit', 'show']);

    Route::resource('admin/produk', AdminProdukController::class)
        ->names('admin.produk')
        ->except(['create', 'edit', 'show']);

    // Profil Admin
    Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil.index');
    Route::put('/admin/profil', [ProfilController::class, 'update'])->name('admin.profil.update');
    Route::delete('/admin/profil/foto', [ProfilController::class, 'hapusFoto'])->name('admin.profil.foto.hapus');

    // Notifikasi
    Route::post('/admin/notifikasi/{id}/baca', [NotifikasiController::class, 'tandaiBaca'])->name('admin.notifikasi.baca');
    Route::post('/admin/notifikasi/baca-semua', [NotifikasiController::class, 'tandaiSemuaBaca'])->name('admin.notifikasi.baca-semua');
});