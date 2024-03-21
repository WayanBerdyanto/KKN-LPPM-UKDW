<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function indexKetua()
    {
        return view('mahasiswa.ketua.index');
    }
    public function indexAnggota()
    {
        return view('mahasiswa.anggota.index');
    }
}
