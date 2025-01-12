<?php

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

Route::get('/login', function () {
    return view('pages/login');
})->name('pages.login');