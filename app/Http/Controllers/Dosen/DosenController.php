<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.index');
    }

    public function detailKelompok()
    {
        return view('dosen.detail');
    }

    public function logout()
    {
        Auth::guard('dosen')->logout();
        return redirect('/login');
    }
}
