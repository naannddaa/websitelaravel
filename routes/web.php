<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PendudukController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Kartu Keluarga
Route::resource('kartukeluarga', KartuKeluargaController::class);

// Route untuk Penduduk
Route::resource('penduduk', PendudukController::class);

// Route untuk Berita
Route::resource('berita', BeritaController::class);
Route::get('upload/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('upload/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('upload/berita/create', [BeritaController::class, 'store'])->name('berita.store');
Route::get('upload/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('upload/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('upload/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
