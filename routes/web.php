<?php

use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\pendudukController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('kartukeluarga',KartuKeluargaController::class);
Route::resource('penduduk',pendudukController::class);
