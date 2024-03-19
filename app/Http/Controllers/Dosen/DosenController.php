<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        return view('dosen.index');
    }

    public function detailKelompok(){
        return view('dosen.detail');
    }
}
