<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Bidang\AdminController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
});

/*
|--------------------------------------------------------------------------
| AUTH (Login & Register)
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

/*
|--------------------------------------------------------------------------
| ROUTE DASHBOARD PER ROLE
|--------------------------------------------------------------------------
*/

// === Admin ===
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/admin/suratMasuk', [AdminController::class, 'surat_masuk'])->name('admin.input_surat');
    Route::get('/admin/dataSuratMasuk', [AdminController::class, 'data_surat'])->name('admin.dataSuratMasuk');
    Route::get('/admin/dataSuratMasuk', [AdminController::class, 'dataSuratMasuk'])->name('admin.dataSuratMasuk');
    Route::post('/admin/suratmasuk/store', [AdminController::class, 'store'])->name('admin.suratmasuk.store');
    Route::get('/admin/suratmasuk/{id}/detail', [AdminController::class, 'show'])->name('admin.suratmasuk.detail');

});


// === Kepala Badan ===
Route::middleware(['auth', 'role:Kepala Badan'])->group(function () {
    Route::get('/kepala/dashboard', fn () => view('kaban.dashboard'))->name('kaban.dashboard');
});


// === Bidang Aset ===
Route::middleware(['auth', 'role:Bidang Asset'])->group(function () {
    Route::get('/asset/dashboard', fn () => view('asset.dashboard'))->name('asset.dashboard');
});


// === Bidang Akuntansi ===
Route::middleware(['auth', 'role:Bidang Akuntansi'])->group(function () {
    Route::get('/akuntansi/dashboard', fn () => view('akuntansi.dashboard'))->name('akuntansi.dashboard');
});


// === Bidang Anggaran ===
Route::middleware(['auth', 'role:Bidang Anggaran'])->group(function () {
    Route::get('/anggaran/dashboard', fn () => view('anggaran.dashboard'))->name('anggaran.dashboard');
});


// === Bidang Pembendaharaan ===
Route::middleware(['auth', 'role:Bidang Pembendaharaan'])->group(function () {
    Route::get('/pembendaharaan/dashboard', fn () => view('pembendaharaan.dashboard'))->name('pembendaharaan.dashboard');
});


/*
|--------------------------------------------------------------------------
| Fallback Route (jika ada error URL tidak ditemukan)
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

