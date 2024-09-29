<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KirimEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $peminjaman;

    public function __construct($peminjaman)
    {
        $this->peminjaman = $peminjaman;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('PerpustakaanAssalaam@gmail.com', 'Admin Perpus'),
            subject: 'Kirim Email',
        );
    }

    public function content(): Content
    {
        if ($this->peminjaman->status_pengajuan === 'pengajuan diterima') {
            return new Content(
                view: 'email.peminjaman_diterima',
                with: [
                    'peminjaman' => $this->peminjaman,
                ],
            );
        } elseif ($this->peminjaman->status_pengajuan === 'pengajuan ditolak') {
            return new Content(
                view: 'email.peminjaman_ditolak',
                with: [
                    'peminjaman' => $this->peminjaman,
                ],
            );
        } elseif ($this->peminjaman->status_pengajuan === 'pengembalian diterima') {
            return new Content(
                view: 'email.pengembalian_diterima',
                with: [
                    'peminjaman' => $this->peminjaman,
                ],
            );
        } elseif ($this->peminjaman->status_pengajuan === 'pengembalian ditolak') {
            return new Content(
                view: 'email.pengembalian_ditolak',
                with: [
                    'peminjaman' => $this->peminjaman,
                ],
            );
        }
    }


    public function attachments(): array
    {
        return [];
    }
}
