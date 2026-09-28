<?php

namespace App\Observers;

use App\Models\Produk;
use App\Models\User;
use App\Notifications\AktivitasNotification;
use Illuminate\Support\Facades\Notification;

class ProdukObserver
{
    public function created(Produk $produk): void
    {
        $this->kirim('Produk baru ditambahkan', $produk->nama);
    }

    public function updated(Produk $produk): void
    {
        $this->kirim('Produk diperbarui', $produk->nama);
    }

    public function deleted(Produk $produk): void
    {
        $this->kirim('Produk dihapus', $produk->nama);
    }

    protected function kirim(string $judul, string $pesan): void
    {
        Notification::send(
            User::all(),
            new AktivitasNotification($judul, $pesan, 'produk', route('admin.produk.index'))
        );
    }
}