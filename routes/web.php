<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\LandingPage\LandingPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [LandingPageController::class, 'content'])->name('content');

Route::get('/test', function () {
    return view('dosen.test');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/postLogin', [AuthController::class, 'postLogin']);

Route::middleware('cekstatusDosen:dosen')->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('/dosen/detail', [DosenController::class, 'detailKelompok'])->name('dosen');
});

Route::middleware('cekstatus:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/kelompok', [AdminController::class, 'kelompok'])->name('admin');
    Route::get('/admin/kelompok/detail', [AdminController::class, 'detailKelompok'])->name('admin');
});

Route::middleware('cekstatusmahasiswa:mahasiswa')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'dashboard'])->name('mahasiswa');
    Route::get('/mahasiswa/logbook', [MahasiswaController::class, 'logbook'])->name('mahasiswa');
    Route::get('/mahasiswa/logbook/tambah', [MahasiswaController::class, 'tambah'])->name('mahasiswa');
    Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile'])->name('profile');
    Route::get('/mahasiswa/settings', [MahasiswaController::class, 'settings'])->name('settings');
    Route::get('/mahasiswa/logout', [MahasiswaController::class, 'logout'])->name('logout');

});
