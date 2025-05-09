<?php

use App\Http\Controllers\API\ApiRegisController;
use App\Http\Controllers\API\ApiLoginController;
use App\Http\Controllers\API\status_diajukan_controller;
use App\Http\Controllers\API\status_selesai_controller;
use App\Http\Controllers\API\Getprofil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\status_ditolak_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/register', [ApiRegisController::class, 'register']);
// Route::post('/login', [ApiRegisController::class, 'login1']);

// Route::get('/status', [status_diajukan_controller::class, 'index']);
// Route::post('/login2', [ApiLoginController::class, 'login']);

//biar aman
Route::middleware('api')->group(function(){
    Route::post('/register', [ApiRegisController::class, 'register']);
    Route::post('/login', [ApiRegisController::class, 'login']);
    Route::get('/statusdiajukan', [status_diajukan_controller::class, 'index']);
    Route::get('/getprofil', [Getprofil::class, 'index']);
    Route::get('/statusditolak', [status_ditolak_controller::class, 'index']);
    Route::get('/statusselesai', [status_selesai_controller::class, 'index']);

});

