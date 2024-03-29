<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard', ['key' => 'home']);
    }
    public function logbook()
    {
        return view('mahasiswa.logbook', ['key' => 'logbook']);
    }
    public function tambah()
    {
        return view('mahasiswa.logbook');
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/login');
    }
}
