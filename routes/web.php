<?php

use App\Http\Controllers\API\status_diajukan_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\landing_pageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\master_kartukeluargaController;
use App\Http\Controllers\master_pendudukController;
use App\Http\Controllers\Master_suratController;
use App\Http\Controllers\SuratditolakController;
use App\Http\Controllers\masterAkunController;
use App\Http\Controllers\masterAkunRtController;
use App\Http\Controllers\masterAkunRwController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\LandingBeritaController;
use App\Http\Controllers\generate;

// Dashboard
Route::get('/', [landing_pageController::class, 'tampil'])->name('website');
Route::get('/sktm/view', [generate::class, 'viewSurat'])->name('sktm.view');
Route::get('/sktm/cetak', [generate::class, 'generatePDF'])->name('sktm.cetak');


// Route::get('/', function () {
//     return view('admin.dashboard.index');
// });

Route::get('/check-nama-nik', function () {
    return view('cekk');
})->middleware('auth');  // Pastikan hanya yang login yang bisa mengakses


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/landing_page', [LandingBeritaController::class, 'index'])->name('landing_page.index');
Route::get('/landing_page/{id_berita}', [LandingBeritaController::class, 'show'])->name('landing_page.show');

// Group route admin
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk Berita
    Route::resource('berita', beritaController::class);
    Route::get('upload/berita', [beritaController::class, 'index'])->name('admin.berita.index');
    Route::get('upload/berita/create', [beritaController::class, 'create'])->name('admin.berita.create');
    Route::post('upload/berita/create', [beritaController::class, 'store'])->name('admin.berita.store');
    Route::get('upload/berita/{id}/edit', [beritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('upload/berita/{id}', [beritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('upload/berita/{id}/delete', [beritaController::class, 'destroy'])->name('admin.berita.destroy');


    // MASTER KARTU KELUARGA
    Route::get('master_kartukeluarga', [master_kartukeluargaController::class, 'index']);
    Route::post('master_kartukeluarga/masuk', [master_kartukeluargaController::class, 'masuk'])->name('kartukeluarga.masuk');
    Route::put('master_kartukeluarga/{no_kk}', [master_kartukeluargaController::class, 'update'])->name('kartukeluarga.update');
    Route::get('master_kartukeluarga/{no_kk}', [master_kartukeluargaController::class, 'delete'])->name('kartukeluarga.delete');
    Route::get('get-data-kk/{no_kk}', [master_kartukeluargaController::class, 'getDataKK']);

    // MASTER PENDUDUK
    Route::get('master_penduduk', [master_pendudukController::class, 'index']);
    Route::post('master_penduduk/masuk', [master_pendudukController::class, 'masuk']);
    Route::put('master_penduduk/{nik}', [master_pendudukController::class, 'update']);
    Route::get('master_penduduk/{nik}', [master_pendudukController::class, 'delete'])->name('penduduk.delete');

    // MASTER AKUN RW
    Route::get('akunrw/create', [masterAkunRwController::class, 'create']);
    Route::get('akunrw', [masterAkunRwController::class, 'index'])->name('akunrw');
    Route::post('akunrw/store', [masterAkunRwController::class, 'store'])->name('akunrw.store');
    Route::put('akunrw/update/{id}', [masterAkunRwController::class, 'update'])->name('akunrw.update');
    Route::delete('akunrw/{id}', [masterAkunRwController::class, 'destroy'])->name('akun.destroy');
    Route::get('get-nama-rw', [masterAkunRwController::class, 'getNamaRw']);

    // MASTER AKUN RT
    Route::get('akunrt/create', [masterAkunRtController::class, 'create']);
    Route::get('akunrt', [masterAkunRtController::class, 'index'])->name('akunrt');
    Route::post('akunrt/store', [masterAkunRtController::class, 'store'])->name('akun.store');
    Route::put('akunrt/update/{id}', [masterAkunRtController::class, 'update'])->name('akun.update');
    Route::get('akunrt/{id_rtrw}', [masterAkunRtController::class, 'destroy'])->name('akunrt.destroy');
    Route::get('get-nama-by-nik', [masterAkunRtController::class, 'getNamaByNik']);

    // LANDING PAGE
    Route::get('/landingpage', [landing_pageController::class, 'index'])->name('homepage.index');
    Route::post('/landingpage', [landing_pageController::class, 'update'])->name('homepage.update');

    // PENGAJUAN SURAT
    Route::get('/admin/count-pengajuan', function() {
        $count = \App\Models\master_pengajuan::where('status', 'Diajukan')->count();
    return response()->json(['count' => $count]);
    });

    Route::get('/suratmasuk', [SuratmasukController::class, 'index'])->name('pengajuan.masuk');
    Route::post('/suratmasuk/{id_pengajuan}/setuju', [SuratmasukController::class, 'setuju'])->name('pengajuan.setuju');
    Route::post('/suratmasuk/{id_pengajuan}/tolak', [SuratmasukController::class, 'tolak'])->name('pengajuan.tolak');
    Route::delete('/suratmasuk/{id_pengajuan}/delete', [SuratmasukController::class, 'destroy'])->name('pengajuan.hapus');


    Route::get('/suratditolak', [SuratditolakController::class, 'index'])->name('suratditolak.tampil');
    Route::delete('/suratditolak/{id_pengajuan}/delete', [SuratditolakController::class, 'destroy'])->name('suratditolak.hapus');

    // MASTER SURAT
    Route::get('/mastersurat', [Master_suratController::class, 'index'])->name('mastersurat.index');
    Route::post('/mastersurat/masuk', [Master_suratController::class, 'store'])->name('mastersurat.store');
    Route::put('/mastersurat/update/{id}', [Master_suratController::class, 'update'])->name('mastersurat.update');
    Route::delete('/mastersurat/delete/{id}', [Master_suratController::class, 'destroy'])->name('mastersurat.destroy');
});
