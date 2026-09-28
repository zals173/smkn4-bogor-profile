<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AktivitasNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected string $judul,
        protected string $pesan,
        protected string $tipe = 'info',
        protected ?string $url = null,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'judul' => $this->judul,
            'pesan' => $this->pesan,
            'tipe'  => $this->tipe,
            'url'   => $this->url,
        ];
    }
}