<?php

use App\Console\Commands\ChangeReservationFinished;
use App\Console\Commands\ChangeReservationInProgress;
use App\Console\Commands\SendReservationReminders;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Schedule::command(SendReservationReminders::class)->timezone('America/Lima')->at('07:00:00')->everyThirtyMinutes();

//Schedule::command(ChangeReservationInProgress::class)->timezone('America/Lima')->at('08:00:00')->everyThirtyMinutes();

//Schedule::command(ChangeReservationFinished::class)->timezone('America/Lima')->at('09:00:00')->everyThirtyMinutes();

Schedule::command(SendReservationReminders::class)->timezone('America/Lima')->everyThirtyMinutes();

Schedule::command(ChangeReservationInProgress::class)->timezone('America/Lima')->everyThirtyMinutes();

Schedule::command(ChangeReservationFinished::class)->timezone('America/Lima')->everyThirtyMinutes();