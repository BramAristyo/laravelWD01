<?php

use App\Models\Periksa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;

/* --------------- Guest bisa login dan register --------------- */
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
/* --------------- Pasien bisa ke halaman dashboard, periksa, dan riwayat --------------- */

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.dashboard');
Route::get('/pasien/periksa', [PasienController::class, 'showPeriksa'])->name('pasien.periksa');
Route::post('/pasien/periksa', [PasienController::class, 'periksa'])->name('pasien.periksaStore');
Route::get('/pasien/riwayat', [PasienController::class, 'riwayat'])->name('pasien.riwayat');


/* --------------- Dokter bisa ke halaman dashboard, memeriksa pasien, dan obat --------------- */
Route::get('/dokter/obat', [DokterController::class, 'showObat'])->name('dokter.obat');
Route::post('/dokter/obat', [DokterController::class, 'storeObat'])->name('dokter.obatStore');
Route::get('/dokter/obat/edit/{id}', [DokterController::class, 'editObat'])->name('dokter.obatEdit');
Route::put('/dokter/obat/update/{id}', [DokterController::class, 'updateObat'])->name('dokter.obatUpdate');
Route::delete('/dokter/obat/delete/{id}', [DokterController::class, 'destroyObat'])->name('dokter.obatDelete');

Route::get('/dokter', function () {
    return view('dokter.dashboard');
})->name('dokter.dashboard');

Route::get('/dokter/periksa', function () {
    $periksas = Periksa::all();
    return view('dokter.periksa', compact('periksas'));
})->name('dokter.periksa');

// Route::get('/dokter/obat', function () {
//     return view('dokter.obat');
// })->name('dokter.obat');
