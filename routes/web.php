<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatuanProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
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

Route::get('/lupa-password', [AuthController::class, 'showForgotPasswordForm'])->name('lupa-password')->middleware('guest');
Route::post('/lupa-password', [AuthController::class, 'forgotPassword'])->name('forgot-password')->middleware('guest');
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset-password')->middleware('guest');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password.post')->middleware('guest');
Route::post('/ubah-password', [AuthController::class, 'updatePassword'])->name('ubah-password')->middleware('auth');

Route::get('/profil', [ProfileController::class, 'index'])->name('profil')->middleware('auth');
Route::post('/profil', [ProfileController::class, 'editprofile'])->name('editprofil')->middleware('auth');

Route::get('/home', function () {
    return view('general.index');
})->name('home')->middleware('auth');

Route::get('/pendaftaran-toko', [TokoController::class, 'daftarToko'])->name('pendaftaran-toko')->middleware('auth');
Route::post('/store-toko', [TokoController::class, 'store'])->name('store-toko')->middleware('auth');
Route::get('/get-provinces', [TokoController::class, 'getProvinces'])->middleware('auth');
Route::get('/get-cities/{provId}', [TokoController::class, 'getCities'])->middleware('auth');
Route::get('/get-districts/{cityId}', [TokoController::class, 'getDistricts'])->middleware('auth');
Route::get('/get-subdistricts/{disId}', [TokoController::class, 'getSubdistricts'])->middleware('auth');

// Route::middleware(['auth', 'role:2'])->group(function () {
// });


// =========================================================================
// =========================================================================

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth');

Route::get('/admin/verifikasi-pendaftaran', [TokoController::class, 'verifToko'])->name('admin.verifikasi-toko')->middleware('auth');
Route::post('/admin/toko/approve/{id}', [TokoController::class, 'approve'])->name('toko.approve')->middleware('auth');
Route::post('/admin/toko/reject/{id}', [TokoController::class, 'reject'])->name('toko.reject')->middleware('auth');

Route::get('/admin/master-toko', [TokoController::class, 'masterToko'])->name('admin.master-toko')->middleware('auth');
Route::post('/admin/toko/nonaktif/{id}', [TokoController::class, 'nonaktif'])->name('toko.nonaktif')->middleware('auth');
Route::post('/admin/toko/aktif/{id}', [TokoController::class, 'aktif'])->name('toko.aktif')->middleware('auth');

Route::get('/admin/master-pengguna', [UserController::class, 'masterUser'])->name('admin.master-pengguna')->middleware('auth');
Route::post('/admin/user/nonaktif/{id}', [UserController::class, 'nonaktif'])->name('admin.master-usernonaktif')->middleware('auth');
Route::post('/admin/user/aktif/{id}', [UserController::class, 'aktif'])->name('admin.master-useraktif')->middleware('auth');

// =========================================================================
// =========================================================================

Route::get('/slugtoko/manager/dashboard', function () {
    return view('toko.manager.index');
})->name('manager.dashboard');

Route::get('/{slug}/manager/master/satuan-produk', [SatuanProdukController::class, 'masterSatuan'])->name('manager.master-satuan-produk')->middleware('auth');
Route::post('/{slug}/manager/master/satuan-produk', [SatuanProdukController::class, 'storeSatuan'])->name('manager.store-satuan')->middleware('auth');
Route::post('/manager/master/satuan-produk/edit', [SatuanProdukController::class, 'editSatuan'])->name('manager.edit-satuan')->middleware('auth');
Route::post('/manager/master/satuan-produk/nonaktif/{id}', [SatuanProdukController::class, 'nonaktif'])->name('manager.master-satuannonaktif')->middleware('auth');
Route::post('/manager/master/satuan-produk/aktif/{id}', [SatuanProdukController::class, 'aktif'])->name('manager.master-satuanaktif')->middleware('auth');

Route::get('/{slug}/manager/master/produk', [ProdukController::class, 'masterProduk'])->name('manager.master-produk')->middleware('auth');
Route::post('/{slug}/manager/master/produk', [ProdukController::class, 'storeProduk'])->name('manager.store-produk')->middleware('auth');
Route::post('/manager/master/produk/edit', [ProdukController::class, 'editProduk'])->name('manager.edit-produk')->middleware('auth');
Route::post('/manager/master/produk/nonaktif/{id}', [ProdukController::class, 'nonaktif'])->name('manager.master-produknonaktif')->middleware('auth');
Route::post('/manager/master/produk/aktif/{id}', [ProdukController::class, 'aktif'])->name('manager.master-produkaktif')->middleware('auth');

Route::get('/{slug}/manager/master/staff', [ManagerController::class, 'masterStaff'])->name('manager.master-staff')->middleware('auth');
Route::post('/{slug}/manager/master/staff', [ManagerController::class, 'storeStaff'])->name('manager.store-staff')->middleware('auth');
Route::get('/verify-staff/{token}', [ManagerController::class, 'verifyStaff'])->name('verify.staff');
Route::post('/manager/staff/nonaktif/{id}', [ManagerController::class, 'nonaktif'])->name('manager.master-staffnonaktif')->middleware('auth');
Route::post('/manager/staff/aktif/{id}', [ManagerController::class, 'aktif'])->name('manager.master-staffaktif')->middleware('auth');

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
