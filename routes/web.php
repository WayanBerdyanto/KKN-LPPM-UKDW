<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;

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

Route::get('/login', [AuthController::class, 'index']);

Route::get('dosen/', [DosenController::class, 'index']);

Route::get('dosen/detail/', [DosenController::class, 'detailKelompok']);

Route::get('admin/', [AdminController::class, 'index']);
Route::get('admin/kelompok', [AdminController::class, 'kelompok']);
