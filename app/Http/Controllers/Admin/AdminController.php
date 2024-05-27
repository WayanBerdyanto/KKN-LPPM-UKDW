<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $result = DB::table('kelompokkkn AS kk')
            ->join('jeniskkn AS jk', 'kk.kode_jenis', '=', 'jk.kode_jenis')
            ->select('kk.nama_kelompok', 'jk.nama_kkn', DB::raw('COUNT(kk.kode_jenis) AS jumlah'))
            ->groupBy('kk.nama_kelompok', 'jk.nama_kkn')
            ->get();
        $mahasiswa = DB::table('mahasiswas')
            ->select(DB::raw('COUNT(mahasiswas.username) AS jumlah'))
            ->get();
        $dosen = DB::table('dosens')
            ->select(DB::raw('COUNT(dosens.nip) AS jumlah'))
            ->get();
        $kelompok = DB::table('kelompokkkn as kel')
            ->select(DB::raw('COUNT(kel.kode_kelompok) AS jumlah_kelompok'))
            ->get();
        return view('admin.index', ['key' => 'home', 'result' => $result, 'dosen' => $dosen, 'mahasiswa' => $mahasiswa, 'kelompok' => $kelompok]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
