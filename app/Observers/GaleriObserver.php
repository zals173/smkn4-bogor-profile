<?php

namespace App\Observers;

use App\Models\Galeri;
use App\Models\User;
use App\Notifications\AktivitasNotification;
use Illuminate\Support\Facades\Notification;

class GaleriObserver
{
    public function created(Galeri $galeri): void
    {
        $this->kirim('Foto galeri baru ditambahkan', $galeri->judul);
    }

    public function updated(Galeri $galeri): void
    {
        $this->kirim('Foto galeri diperbarui', $galeri->judul);
    }

    public function deleted(Galeri $galeri): void
    {
        $this->kirim('Foto galeri dihapus', $galeri->judul);
    }

    protected function kirim(string $judul, string $pesan): void
    {
        Notification::send(
            User::all(),
            new AktivitasNotification($judul, $pesan, 'galeri', route('admin.galeri.index'))
        );
    }
}