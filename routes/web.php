<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\master_kartukeluargaController;
use App\Http\Controllers\master_pendudukController;
use App\Models\master_kartukeluarga;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
Route::get('/get-data-kk/{no_kk}', [master_kartukeluargaController::class, 'getDataKK']);
Route::get('/master_kartukeluarga/{no_kk}/edit',[master_kartukeluargaController::class,'edit']);
Route::put('/master_kartukeluarga/{no_kk}',[master_kartukeluargaController::class,'update']);


// MASTER PENDUDUK
Route::get('/master_penduduk', [master_pendudukController::class, 'index']);
Route::get('/master_penduduk/tambah', [master_pendudukController::class, 'tambah']);
Route::post('/master_penduduk/masuk', [master_pendudukController::class, 'masuk']);
Route::get('/master_penduduk/{nik}/edit', [master_pendudukController::class, 'edit']);
Route::put('/master_penduduk/{nik}', [master_pendudukController::class, 'update']);
Route::get('/master_penduduk/{nik}', [master_pendudukController::class, 'delete']);

