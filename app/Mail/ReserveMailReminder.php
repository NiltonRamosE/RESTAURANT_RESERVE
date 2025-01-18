<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReserveMailReminder extends Mailable
{
    use Queueable, SerializesModels;

    private $reserveInformation;

    public function __construct($reserveInformation)
    {
        $this->reserveInformation = $reserveInformation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('notification@sietesopas.org', '7 SOPAS'),
            subject: 'Notificación de la reserva',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.notification-reserve',
            with: [
                'reserveInformation' => $this->reserveInformation,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
