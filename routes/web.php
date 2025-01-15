<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservaController;
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

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('auth.index');
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::resource('register', RegisterController::class)->only([
    'create', 'store'
]);

Route::resource('reserva', ReservaController::class);