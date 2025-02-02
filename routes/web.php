<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\kartukeluargaController;
use App\Http\Controllers\DashboardController;

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
