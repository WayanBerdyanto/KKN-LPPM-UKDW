<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard', ['key'=>'dashboard']);
    }
    public function logbook()
    {
        return view('mahasiswa.logbook', ['key'=>'logbook']);
    }
    public function tambah()
    {
        return view('mahasiswa.logbook');
    }
}
