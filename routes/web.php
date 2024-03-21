<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dosen\DosenController;

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

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/test', function () {
    return view('dosen.test');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/postLogin', [AuthController::class, 'postLogin']);
// Route::get('/postLogin', [AuthController::class, 'postLogin']);

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');

Route::get('/dosen/detail', [DosenController::class, 'detailKelompok'])->name('dosen');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/kelompok', [AdminController::class, 'kelompok'])->name('admin');

Route::get('/admin/kelompok/detail', [AdminController::class, 'detailKelompok'])->name('admin');

Route::get('/ketua', [MahasiswaController::class, 'indexKetua'])->name('ketua');

Route::get('/anggota', [MahasiswaController::class, 'indexAnggota'])->name('anggota');
