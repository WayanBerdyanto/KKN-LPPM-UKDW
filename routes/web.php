<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DaftarMahasiswaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\Mahasiswa\MahasiswaController;
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
    Route::get('/dosen/logout', [DosenController::class, 'logout'])->name('dosen');
});

Route::middleware('cekstatus:admin')->group(function () {
    // DASHBOARD PAGE
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/postsemester', [AdminController::class, 'PostSemesterAktif'])->name('postsemester');
    // END DASHBOARD PAGE

    // START KELOMPOK PAGE
    Route::get('/admin/kelompok', [AdminController::class, 'kelompok'])->name('admin');
    Route::get('/admin/kelompok/detail', [AdminController::class, 'detailKelompok'])->name('admin');
    // END KELOMPOK PAGE

    // START DaftarMahasiswa
    Route::get('/admin/daftarmahasiswa', [AdminController::class, 'daftarmahasiswa'])->name('daftarmahasiswa');
    Route::get('/admin/daftarmahasiswa/search', [DaftarMahasiswaController::class, 'search'])->name('search');
    Route::get('/admin/daftarmahasiswa/insert', [DaftarMahasiswaController::class, 'insertMhs'])->name('insert mahasiswa');
    Route::post('/admin/daftarmahasiswa/postinsert', [DaftarMahasiswaController::class, 'PostInsertMhs'])->name('insert mahasiswa');
    Route::get('/admin/daftarmahasiswa/update/{id}', [DaftarMahasiswaController::class, 'updateMhs'])->name('Update mahasiswa');
    Route::put('/admin/daftarmahasiswa/postupdate/{id}', [DaftarMahasiswaController::class, 'PostUpdateMhs'])->name('Update mahasiswa');
    Route::get('/admin/daftarmahasiswa/resetpassword/{id}', [DaftarMahasiswaController::class, 'ResetPassword'])->name('Reset Password');
    Route::get('/admin/daftarmahasiswa/delete/{id}', [DaftarMahasiswaController::class, 'DeleteMahasiswa'])->name('Hapus Mahasiswa');
    // END Daftar Mahasiswa
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin');
});

Route::middleware('cekstatusmahasiswa:mahasiswa')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'dashboard'])->name('mahasiswa');
    Route::get('/mahasiswa/logbook', [MahasiswaController::class, 'logbook'])->name('mahasiswa');
    Route::get('/mahasiswa/logbook/tambah', [MahasiswaController::class, 'tambah'])->name('mahasiswa');
    Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile'])->name('profile');
    Route::get('/mahasiswa/settings', [MahasiswaController::class, 'settings'])->name('settings');
    Route::get('/mahasiswa/logout', [MahasiswaController::class, 'logout'])->name('logout');
});
