<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanKegiatanController extends Controller
{
    public function laporankegiatan(){
        return view('mahasiswa.laporankegiatan',['key' => 'kegiatan']);
    }
}
