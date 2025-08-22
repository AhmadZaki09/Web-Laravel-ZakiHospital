<?php

use App\Http\Controllers\Hospital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/navbar', [Hospital::class, 'navbar']);
Route::get('/index', [Hospital::class, 'index'])->name('index');
Route::get('/daftar-pasien', [Hospital::class, 'daftar'])->name('daftar');
Route::get('/login', [Hospital::class, 'login'])->name('login');
Route::post('/login-valid', [Hospital::class, 'loginvalid']);
Route::get('/register', [Hospital::class, 'register']);
Route::post('/register-valid', [Hospital::class, 'registervalid']);
Route::post('/pasien-valid', [Hospital::class, 'pasienvalid']);
Route::get('/logout', [Hospital::class, 'logout']);
Route::get('/data-pasien', [Hospital::class, 'datapasien'])->name('data');
Route::get('/data-pasien/{id}/delete', [Hospital::class, 'deletepasien']);
Route::get('/data-pasien/{id}/edit', [Hospital::class, 'editpasien']);
Route::patch('/data-pasien/{id}/update', [Hospital::class, 'updatepasien']);

Route::get('/dokter', [dokterController::class, 'show'])->name('dokter');
Route::get('/tambah-dokter', [dokterController::class, 'tambah']);
Route::post('/simpan-dokter', [dokterController::class, 'simpan']);
Route::get('/dokter/{id}/delete', [dokterController::class, 'delete']);
Route::get('/dokter/{id}/edit', [dokterController::class, 'edit']);
Route::patch('/dokter/{id}/update', [dokterController::class, 'update']);

Route::post('/komentar/{dokter_id}', [dokterController::class, 'komentar']);




