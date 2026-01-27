<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/index', [IndexController::class, 'index']);
    Route::get('/about', [IndexController::class, 'about']);
    Route::get('/data-siswa', [IndexController::class, 'dataSiswa']);
    Route::get('/siswa/tambah', [IndexController::class, 'create']);
    Route::post('/siswa/tambah', [IndexController::class, 'store']);
    Route::get('/siswa/edit/{id}', [IndexController::class, 'edit']);
    Route::put('/siswa/update/{id}', [IndexController::class, 'update']);
    Route::get('/siswa/hapus/{id}', [IndexController::class, 'delete']);
    Route::delete('/siswa/delete/{id}', [IndexController::class, 'destroy']);
});

Route::get('/homepage', [HomeController::class, 'homepage']);
Route::get('/pendaftaran', [HomeController::class, 'pendaftaran']);
Route::post('/simpan/pendaftaran', [HomeController::class, 'SimpanPendaftaran']);

Route::get('/login', [AuthController::class, 'halLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/homepage', [HomeController::class, 'homepage'])->middleware('auth');