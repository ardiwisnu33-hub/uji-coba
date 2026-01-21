<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',[IndexController::class, 'index']);
Route::get('/about',[IndexController::class, 'about']);
Route::get('/data-siswa',[IndexController::class, 'dataSiswa']);
Route::get('/siswa/tambah',[IndexController::class, 'create']);
Route::post('/siswa/tambah',[IndexController::class, 'store']);
Route::get('/siswa/edit/{id}',[IndexController::class, 'edit']);
Route::put('/siswa/update/{id}',[IndexController::class, 'update']);
Route::get('/siswa/hapus/{id}', [IndexController::class, 'delete']);
Route::delete('/siswa/delete/{id}', [IndexController::class, 'destroy']);