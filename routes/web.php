<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/index');
})->name('pages.index');

Route::get('/menu', function () {
    return view('pages/menu');
})->name('pages.menu');

Route::get('/reservas', function () {
    return view('pages/reservas');
})->name('pages.reservas');

Route::get('/nosotros', function () {
    return view('pages/nosotros');
})->name('pages.nosotros');

Route::prefix('login')->controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login.index');
    Route::post('/auth', 'login')->name('login.auth');
});

Route::resource('register', RegisterController::class)->only([
    'create', 'store'
]);