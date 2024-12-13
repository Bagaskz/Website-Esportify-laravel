<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TeamController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('team', TeamController::class);
Route::resource('jadwal', JadwalController::class)->only('index','cetak','create','edit','update','store','destroy');

// Route::get('/jadwal',[JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/cetak', [JadwalController::class, 'cetak'])->name('jadwal.cetak');

