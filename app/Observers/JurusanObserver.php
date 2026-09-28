<?php

namespace App\Observers;

use App\Models\Jurusan;
use App\Models\User;
use App\Notifications\AktivitasNotification;
use Illuminate\Support\Facades\Notification;

class JurusanObserver
{
    public function created(Jurusan $jurusan): void
    {
        $this->kirim('Program keahlian baru ditambahkan', $jurusan->nama);
    }

    public function updated(Jurusan $jurusan): void
    {
        $this->kirim('Program keahlian diperbarui', $jurusan->nama);
    }

    public function deleted(Jurusan $jurusan): void
    {
        $this->kirim('Program keahlian dihapus', $jurusan->nama);
    }

    protected function kirim(string $judul, string $pesan): void
    {
        Notification::send(
            User::all(),
            new AktivitasNotification($judul, $pesan, 'jurusan', route('admin.jurusan.index'))
        );
    }
}