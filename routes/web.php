<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// =========================================================================
// =========================================================================

Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('post.login')->middleware('guest');

Route::get('/daftar', function () {
    return view('auth.register');
})->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('post.register')->middleware('guest');
Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login')->middleware('guest');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/lupa-password', [AuthController::class, 'showForgotPasswordForm'])->name('lupa-password');
Route::post('/lupa-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password.post');
Route::post('/ubah-password', [AuthController::class, 'updatePassword'])->name('ubah-password');

Route::get('/profil', function () {
    return view('profile.index');
})->name('profil')->middleware('auth');

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/home', function () {
        return view('general.index');
    })->name('home');

    Route::get('/pendaftaran-toko', function () {
        return view('general.daftarToko');
    })->name('pendaftaran-toko');

    Route::get('/get-provinces', [TokoController::class, 'getProvinces']);
    Route::get('/get-cities/{provId}', [TokoController::class, 'getCities']);
    Route::get('/get-districts/{cityId}', [TokoController::class, 'getDistricts']);
    Route::get('/get-subdistricts/{disId}', [TokoController::class, 'getSubdistricts']);
});


// =========================================================================
// =========================================================================

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth');

Route::get('/admin/verifikasi-pendaftaran', function () {
    return view('admin.verifikasi-pendaftaran');
})->name('admin.verifikasi-toko');

Route::get('/admin/master-toko', function () {
    return view('admin.m-toko');
})->name('admin.master-toko');

Route::get('/admin/master-pengguna', function () {
    return view('admin.m-pengguna');
})->name('admin.master-pengguna');

// =========================================================================
// =========================================================================

Route::get('/slugtoko/manager/dashboard', function () {
    return view('toko.manager.index');
})->name('manager.dashboard');

Route::get('/slugtoko/manager/master/satuan-produk', function () {
    return view('toko.manager.satuan-produk');
})->name('manager.master-satuan-produk');

Route::get('/slugtoko/manager/master/produk', function () {
    return view('toko.manager.produk');
})->name('manager.master-produk');

Route::get('/slugtoko/manager/master/staff', function () {
    return view('toko.manager.staff');
})->name('manager.master-staff');

Route::get('/slugtoko/manager/pengadaan-restock', function () {
    return view('toko.inflow.pengadaan-restock');
})->name('manager.pengadaan-restock');

Route::get('/slugtoko/manager/restock', function () {
    return view('toko.inflow.restock');
})->name('manager.restock');

Route::get('/slugtoko/manager/penjualan', function () {
    return view('toko.outflow.penjualan');
})->name('manager.penjualan');

Route::get('/slugtoko/manager/expired', function () {
    return view('toko.outflow.expired');
})->name('manager.expired');

// =========================================================================
// =========================================================================

Route::get('/slugtoko/staffgudang/dashboard', function () {
    return view('toko.st-gudang.index');
})->name('stgudang.dashboard');

Route::get('/slugtoko/staffgudang/retur-supplier', function () {
    return view('toko.st-gudang.retur-supplier');
})->name('stgudang.retur-supplier');

Route::get('/slugtoko/staffgudang/pengadaan-restock', function () {
    return view('toko.inflow.pengadaan-restock');
})->name('stgudang.pengadaan-restock');

Route::get('/slugtoko/staffgudang/restock', function () {
    return view('toko.inflow.restock');
})->name('stgudang.restock');

Route::get('/slugtoko/staffgudang/expired', function () {
    return view('toko.outflow.expired');
})->name('stgudang.expired');

// =========================================================================
// =========================================================================

Route::get('/slugtoko/staffpenjualan/dashboard', function () {
    return view('toko.st-penjualan.index');
})->name('stpenjualan.dashboard');

Route::get('/slugtoko/staffpenjualan/retur-konsumen', function () {
    return view('toko.st-penjualan.retur-konsumen');
})->name('stpenjualan.retur-konsumen');

Route::get('/slugtoko/staffpenjualan/penjualan', function () {
    return view('toko.outflow.penjualan');
})->name('stpenjualan.penjualan');
