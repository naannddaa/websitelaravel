<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\kartukeluargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\forgot_passwordController;
use App\Http\Controllers\halaman_utamaController;
use App\Http\Controllers\landing_pageController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\master_kartukeluargaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route untuk Kartu Keluarga
Route::resource('kartukeluarga', kartukeluargaController::class);
// Route untuk Berita
Route::resource('admin/berita', BeritaController::class);
Route::get('upload/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
Route::get('upload/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('upload/berita/create', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('upload/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('upload/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('upload/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
//MASTER KARTU KELUARGA
Route::get('/master_kartukeluarga',[master_kartukeluargaController::class,'index']);
Route::get('/master_kartukeluarga/tambah',[master_kartukeluargaController::class,'tambah']);
Route::post('/master_kartukeluarga/masuk',[master_kartukeluargaController::class,'masuk']);
Route::get('/master_kartukeluarga/{no_kk}/edit',[master_kartukeluargaController::class,'edit']);
Route::put('/master_kartukeluarga/{no_kk}',[master_kartukeluargaController::class,'update']);
Route::get('/master_kartukeluarga/{no_kk}',[master_kartukeluargaController::class,'delete']);
//LANDING PAGE
Route::get('/landing_page',[landing_pageController::class,'index']);
//LOGIN
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');
// RUTE YANG DIAKSES OLEH USER YANG SUDAH LOGIN
Route::middleware('auth')->group(function () {
    Route::get('/landing_page', function () {
        return view('landing_page');
    })->name('landing_page');
});
//FORGOT PASSWORD
Route::get('/forgot_password', [forgot_passwordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot_password', [forgot_passwordController::class, 'sendResetLinkEmail'])->name('password.email');
//HALAMAN UTAMA
Route::get('/halaman_utama',[halaman_utamaController::class,'index']);



