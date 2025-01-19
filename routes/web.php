<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservaController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {   
    return view('pages/index');
})->name('pages.index');

Route::get('/menu', function () {
    return view('pages/menu');
})->name('pages.menu');

Route::get('/nosotros', function () {
    return view('pages/nosotros');
})->name('pages.nosotros');

Route::middleware([CheckAuth::class])->prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('auth.index');
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/logout', 'logout')->name('auth.logout')->withoutMiddleware([CheckAuth::class]);
});

Route::prefix('mesas')->controller(MesaController::class)->group(function () {
    Route::get('/{id}', 'getPrecio');
    Route::get('/reservas-actuales/{id}', 'reservasActuales')->name('mesas.reservasActuales');
});

Route::prefix('calendario')->controller(CalendarioController::class)->group(function () {
    Route::get('/reservations/{fecha?}', 'index')->name('calendario.index');
});

Route::middleware([CheckAuth::class])->resource('register', RegisterController::class)->only([
    'create', 'store'
]);

Route::resource('reserva', ReservaController::class);