<?php
// routes/web.php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProyekController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Mahasiswa Routes
Route::resource('mahasiswas', MahasiswaController::class);

// Dosen Routes
Route::resource('dosens', DosenController::class);

// Proyek Routes
Route::resource('proyeks', ProyekController::class);