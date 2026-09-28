<?php

namespace App\Observers;

use App\Models\Artikel;
use App\Models\User;
use App\Notifications\AktivitasNotification;
use Illuminate\Support\Facades\Notification;

class ArtikelObserver
{
    public function created(Artikel $artikel): void
    {
        $this->kirim('Artikel baru ditambahkan', $artikel->judul);
    }

    public function updated(Artikel $artikel): void
    {
        $this->kirim('Artikel diperbarui', $artikel->judul);
    }

    public function deleted(Artikel $artikel): void
    {
        $this->kirim('Artikel dihapus', $artikel->judul);
    }

    protected function kirim(string $judul, string $pesan): void
    {
        Notification::send(
            User::all(),
            new AktivitasNotification($judul, $pesan, 'artikel', route('admin.artikel.index'))
        );
    }
}