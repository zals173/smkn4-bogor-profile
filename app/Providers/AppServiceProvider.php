<?php

namespace App\Providers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Jurusan;
use App\Models\Produk;
use App\Observers\ArtikelObserver;
use App\Observers\GaleriObserver;
use App\Observers\JurusanObserver;
use App\Observers\ProdukObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale(config('app.locale'));

        Jurusan::observe(JurusanObserver::class);
        Artikel::observe(ArtikelObserver::class);
        Galeri::observe(GaleriObserver::class);
        Produk::observe(ProdukObserver::class);
    }
}