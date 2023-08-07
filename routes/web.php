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

Route::get('/dataTamu',[BukuTamuController::class,  'index'])->middleware('auth');

Route::get('/kunjungan/edit/{id}', [BukuTamuController::class, 'edit'])->middleware('auth');
// Route::post('/kunjungan/update/{id}/', [BukuTamuController::class, 'update'])->name('kunjungan.update');
Route::post('/kunjungan/update', [BukuTamuController::class,'update'])->middleware('auth');
Route::post('/kunjungan/update/{id}', [BukuTamuController::class,'update'])->name('kunjungan.update')->middleware('auth');
Route::get('/kunjungan/hapus/{id}',[BukuTamuController::class,'hapus'])->middleware('auth');

Route::get('/master', function(){
    return view('layouts.master');
});