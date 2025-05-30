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

// =========================================================================
// =========================================================================

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

// =========================================================================
// =========================================================================

Route::get('/admin/dashboard', function() {
    return view('admin.index');
});

Route::get('/admin/verifikasi-pendaftaran', function() {
    return view('admin.verifikasi-pendaftaran');
});

Route::get('/admin/master-toko', function() {
    return view('admin.m-toko');
});

Route::get('/admin/master-users', function() {
    return view('admin.m-users');
});

// =========================================================================
// =========================================================================

Route::get('/slugtoko/manager/dashboard', function() {
    return view('toko.manager.index');
});

Route::get('/slugtoko/manager/master/satuan-produk', function() {
    return view('toko.manager.satuan-produk');
});

Route::get('/slugtoko/manager/master/produk', function() {
    return view('toko.manager.produk');
});

Route::get('/slugtoko/manager/staff', function() {
    return view('toko.manager.staff');
});

Route::get('/slugtoko/manager/pengadaan-restock', function() {
    return view('toko.manager.pengadaan-restock');
});
