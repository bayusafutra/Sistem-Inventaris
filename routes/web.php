<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/masuk', function() {
    return view('auth.login');
});

Route::get('/daftar', function() {
    return view('auth.register');
});

Route::get('/verifikasi-email', function() {
    return view('auth.verify');
});

Route::get('/lupa-password', function() {
    return view('auth.passwords.forgot');
});

Route::get('/reset-password', function() {
    return view('auth.passwords.reset');
});

Route::get('/profile', function() {
    return view('profile.index');
});

Route::get('/home', function() {
    return view('general.index');
});

Route::get('/pendaftaran-toko', function() {
    return view('general.daftarToko');
});
