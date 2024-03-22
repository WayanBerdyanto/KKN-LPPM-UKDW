<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard');
    }
    public function logbook()
    {
        return view('mahasiswa.logbook');
    }
    public function tambah()
    {
        return view('mahasiswa.logbook');
    }
}
