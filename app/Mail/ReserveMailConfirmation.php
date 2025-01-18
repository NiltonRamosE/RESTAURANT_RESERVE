<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReserveMailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $informationOfClient;
    private $reservaCreated;
    private $mesaFound;

    public function __construct($informationOfClient, $reservaCreated, $mesaFound)
    {
        $this->informationOfClient = $informationOfClient;
        $this->reservaCreated = $reservaCreated;
        $this->mesaFound = $mesaFound;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('confirmacion@sietesopas.org', '7 SOPAS'),
            subject: 'Confirmación de la reserva',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.confirmation-reserve',
            with: [
                'reserva' => $this->reservaCreated,
                'cliente' => $this->informationOfClient,
                'mesa' => $this->mesaFound,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
