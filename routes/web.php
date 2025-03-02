<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\master_kartukeluargaController;
use App\Http\Controllers\master_pendudukController;
use App\Http\Controllers\masterAkunController;
use App\Http\Controllers\masterAkunRtController;
use App\Http\Controllers\masterAkunRwController;
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
Route::get('/master_kartukeluarga/{no_kk}',[master_kartukeluargaController::class,'delete'])->name('kartukeluarga.delete');
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


// MASTER AKUN
//akun rw
Route::resource('akunrw', masterAkunRwController::class);

// akun rt
Route::get('/akunrt/create', [masterAkunRtController::class, 'create']);
Route::get('/akunrt', [masterAkunRtController::class, 'index'])->name('akunrt');
Route::post('/akunrt/store', [masterAkunRtController::class, 'store'])->name('akun.store');
Route::put('/akunrt/update/{id}', [masterAkunRtController::class, 'update'])->name('akun.update');
Route::delete('/akunrt/{id_rtrw}', [masterAkunRtController::class, 'destroy'])->name('akun.destroy');

// Route untuk Auto-Load Data Penduduk
Route::get('/get-penduduk-data', [masterAkunRtController::class, 'getPendudukData']);


