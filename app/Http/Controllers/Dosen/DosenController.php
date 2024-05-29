<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\KelompokKKN;
use App\Models\LaporanKegiatan;
use App\Models\LogbookMahasiswa;
use App\Models\Mahasiswas;
use App\Models\RencanaKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        $id_dosen = Auth::guard('dosen')->id();
        $logbooks = LogbookMahasiswa::select('logbookmahasiswa.id', 'logbookmahasiswa.judul', 'logbookmahasiswa.tanggal', 'logbookmahasiswa.deskripsi', 'logbookmahasiswa.komentar_dosen', 'logbookmahasiswa.komentar_admin','mahasiswas.nama')
            ->join('mahasiswas', 'logbookmahasiswa.id_mahasiswa', '=', 'mahasiswas.id')
            ->join('detailkelompokkkn', 'mahasiswas.id', '=', 'detailkelompokkkn.id_mahasiswa')
            ->join('kelompokkkn', 'detailkelompokkkn.kode_kelompok', '=', 'kelompokkkn.kode_kelompok')
            ->where('kelompokkkn.id_dosen', $id_dosen)
            ->get();

        $laporanKegiatans = LaporanKegiatan::join('kelompokkkn', 'laporankegiatan.kode_kelompok', '=', 'kelompokkkn.kode_kelompok')
            ->where('kelompokkkn.id_dosen', $id_dosen)
            ->select('laporankegiatan.*','kelompokkkn.nama_kelompok')
            ->get();
        $rencanaKegiatans = RencanaKegiatan::join('kelompokkkn', 'rencanakegiatan.kode_kelompok', '=', 'kelompokkkn.kode_kelompok')
            ->where('kelompokkkn.id_dosen', $id_dosen)
            ->select('rencanakegiatan.*','kelompokkkn.nama_kelompok')
            ->get();
        return view('dosen.index', ['key' => 'home', 'log' => $logbooks, 'lap' => $laporanKegiatans, 'ren' => $rencanaKegiatans]);
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
