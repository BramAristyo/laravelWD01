<?php

use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/pasien', function () {
    return view('pasien.dashboard');
});

Route::get('/dokter', function () {
    $periksas = Periksa::all();
    return view('dokter.dashboard', compact('periksas'));
})->name('dokter.dashboard');

Route::get('/obat', function () {
    $obats = Obat::all();
    return view('dokter.obat', compact('obats'));
})->name('obat.index');