<?php

use App\Console\Commands\SendReservationReminders;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(SendReservationReminders::class)->timezone('America/Lima')->at('07:00:00')->everyThirtyMinutes();

//Schedule::command(SendReservationReminders::class)->timezone('America/Lima')->everyMinute();