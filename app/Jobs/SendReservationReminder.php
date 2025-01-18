<?php

namespace App\Jobs;

use App\Mail\ReserveMailReminder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendReservationReminder implements ShouldQueue
{
    use Queueable;

    private $email_destinario;

    private $reserveInformation;

    public function __construct($email_destinario, $reserveInformation)
    {
        $this->email_destinario = $email_destinario;
        $this->reserveInformation = $reserveInformation;
    }

    public function handle(): void
    {
        Mail::to($this->email_destinario)->send(new ReserveMailReminder($this->reserveInformation));
    }
}
