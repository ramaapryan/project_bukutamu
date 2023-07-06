<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuTamuController;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('cihuy', [LoginController::class, 'cihuy'])->name('cihuy');


Route::get('home', [BukuTamuController::class, 'home'])->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Route::post('/buku-tamu', [BukuTamuController::class, 'store'])->name('buku-tamu.store');
Route::post('/buku-tamu', [BukuTamuController::class, 'submit']);
