<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DaftarMahasiswaController;
use App\Http\Controllers\Admin\JenisKKNController;
use App\Http\Controllers\Admin\SemesterAktifController;
use App\Http\Controllers\Admin\KelompokKknController;
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
    // END DASHBOARD PAGE

    // START KELOMPOK PAGE
    Route::get('/admin/kelompok', [KelompokKknController::class, 'kelompok'])->name('admin');
    Route::get('/admin/kelompok/detail/{id}', [KelompokKknController::class, 'detailKelompok'])->name('admin');
    Route::get('/admin/kelompok/forminsert', [KelompokKknController::class, 'FormInsertKelompok'])->name('Form Insert');
    Route::post('/admin/kelompok/postinsertkelompok', [KelompokKknController::class, 'PostInsertKelompok'])->name('Post Insert');
    Route::get('/admin/kelompok/search', [KelompokKknController::class, 'kelompok'])->name('Search Kelompok');
    Route::get('/admin/kelompok/{id}/insertdatakelompok', [KelompokKknController::class, 'DataInsertKelompok'])->name('Data Insert Mahasiswa');
    Route::post('/admin/kelompok/{id}/postdatakelompok', [KelompokKknController::class, 'PostDataKelompok'])->name('Data Insert Mahasiswa');
    Route::get('/admin/kelompok/deletemahasiswa/{id}', [KelompokKknController::class, 'DeleteDataKelompok'])->name('Delete Data Kelompok');
    Route::get('/admin/kelompok/pilihketua/{id}', [KelompokKknController::class, 'PilihKetua'])->name('Pilih Ketua Kelompok');
    Route::get('/admin/kelompok/pilihanggota/{id}', [KelompokKknController::class, 'PilihAnggota'])->name('Pilih Anggota Kelompok');
    // END KELOMPOK PAGE

    // START DaftarMahasiswa
    Route::get('/admin/daftarmahasiswa', [DaftarMahasiswaController::class, 'daftarmahasiswa'])->name('daftarmahasiswa');
    Route::get('/admin/daftarmahasiswa/search', [DaftarMahasiswaController::class, 'search'])->name('search');
    Route::get('/admin/daftarmahasiswa/insert', [DaftarMahasiswaController::class, 'insertMhs'])->name('insert mahasiswa');
    Route::post('/admin/daftarmahasiswa/postinsert', [DaftarMahasiswaController::class, 'PostInsertMhs'])->name('insert mahasiswa');
    Route::get('/admin/daftarmahasiswa/update/{id}', [DaftarMahasiswaController::class, 'updateMhs'])->name('Update mahasiswa');
    Route::put('/admin/daftarmahasiswa/postupdate/{id}', [DaftarMahasiswaController::class, 'PostUpdateMhs'])->name('Update mahasiswa');
    Route::get('/admin/daftarmahasiswa/resetpassword/{id}', [DaftarMahasiswaController::class, 'ResetPassword'])->name('Reset Password');
    Route::get('/admin/daftarmahasiswa/delete/{id}', [DaftarMahasiswaController::class, 'DeleteMahasiswa'])->name('Hapus Mahasiswa');
    Route::get('/admin/detailMahasiswa/{id}', [DaftarMahasiswaController::class, 'DetailMahasiswa'])->name('Detail Mahasiswa');
    // END Daftar Mahasiswa

    // START JENISKKN PAGE
    Route::get('/admin/jeniskkn', [JenisKKNController::class, 'jenisKKN'])->name('jeniskkn');
    Route::post('/admin/postjenis', [JenisKKNController::class, 'postJenisKKN'])->name('Insert Jenis');
    Route::get('/admin/updatejeniskkn/{id}', [JenisKKNController::class, 'UpdateJenis'])->name('Updatejeniskkn');
    Route::put('/admin/postUpdatejenis/{id}', [JenisKKNController::class, 'PostUpdateJenisKKN'])->name('Post Update Jenis');
    Route::get('/admin/deletejeniskkn/{id}', [JenisKKNController::class, 'DeleteJenisKKN'])->name('DeleteJenisKKN');
    // END JENISKKN PAGE

    // Start Semester Aktif KKN
    Route::get('/admin/semesteraktif', [SemesterAktifController::class, 'SemesterAktif'])->name('SemesterAktif');
    Route::post('/admin/postsemester', [SemesterAktifController::class, 'PostSemesterAktif'])->name('postsemester');
    Route::get('/admin/updatesemester/{id}', [SemesterAktifController::class, 'UpdateSemester'])->name('Update Semester');
    Route::put('/admin/postupdate/{id}', [SemesterAktifController::class, 'PostUpdateSemester'])->name('Post Update Semester');
    Route::get('/admin/deletesemester/{id}', [SemesterAktifController::class, 'DeleteSemester'])->name('Hapus Semester');
    // END Semester Aktif KKN
    Route::get('/admin/logout', [SemesterAktifController::class, 'logout'])->name('admin');
});

Route::middleware('cekstatusmahasiswa:mahasiswa')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'dashboard'])->name('mahasiswa');
    Route::get('/mahasiswa/logbook', [MahasiswaController::class, 'logbook'])->name('mahasiswa');
    Route::get('/mahasiswa/logbook/tambah', [MahasiswaController::class, 'tambah'])->name('mahasiswa');
    Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile'])->name('profile');
    Route::get('/mahasiswa/settings', [MahasiswaController::class, 'settings'])->name('settings');
    Route::get('/mahasiswa/logout', [MahasiswaController::class, 'logout'])->name('logout');
});
