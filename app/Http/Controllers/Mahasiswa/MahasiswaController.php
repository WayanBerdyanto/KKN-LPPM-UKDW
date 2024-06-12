<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LaporanKegiatan;
use App\Models\RencanaKegiatan;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $keterangan = '';

        $idMhs = Auth::guard('mahasiswa')->user()->id;
        $resultKode = "";
        $kode_kel = DB::table('detailkelompokkkn as dk')
            ->join('mahasiswas as mh', 'dk.id_mahasiswa', '=', 'mh.id')
            ->select('dk.kode_kelompok', 'mh.nama')
            ->where('dk.id_mahasiswa', '=', $idMhs)
            ->get();
        if ($kode_kel->count() > 0) {
            $resultKode = $kode_kel[0]->kode_kelompok;
        }
        $resultmaster = DB::table('kelompokkkn AS kk')
            ->join('jeniskkn AS j', 'j.kode_jenis', '=', 'kk.kode_jenis')
            ->join('semesteraktif AS sa', 'sa.kode_semester', '=', 'j.kode_semester')
            ->leftJoin('dosens AS d1', 'd1.id', '=', 'kk.id_dosen')
            ->leftJoin('dosens AS d2', 'd2.id', '=', 'kk.id_dosen2')
            ->select(
                'd1.id AS id_dosen1',
                'd1.nama AS nama_dosen1',
                'd2.id AS id_dosen2',
                'd2.nama AS nama_dosen2',
                'kk.*',
                'j.*',
                'sa.*'
            )
            ->where('kk.kode_kelompok', '=', $resultKode)
            ->get();
        $resultDashboard = DB::table('detailkelompokkkn as dk')
            ->join('kelompokkkn as kk', 'kk.kode_kelompok', '=', 'dk.kode_kelompok')
            ->join('mahasiswas as mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->select('dk.*', 'kk.*', 'mh.*')
            ->where('dk.kode_kelompok', '=', $resultKode)
            ->get();
        $nilai = DB::table('mahasiswas')->where('id', $idMhs)->value('nilai');
        switch (true) {
            case $nilai < 45:
                $keterangan = 'E';
                break;
            case $nilai > 45 && $nilai <= 55:
                $keterangan = 'D';
                break;
            case $nilai > 55 && $nilai <= 60:
                $keterangan = 'C';
            case $nilai > 60 && $nilai <= 65:
                $keterangan = 'C+';
                break;
            case $nilai > 65 && $nilai <= 70:
                $keterangan = 'B-';
                break;
            case $nilai > 70 && $nilai <= 75:
                $keterangan = 'B';
                break;
            case $nilai > 75 && $nilai <= 80:
                $keterangan = 'B+';
                break;
            case $nilai > 80 && $nilai <= 85:
                $keterangan = 'A-';
                break;
            case $nilai > 85:
                $keterangan = 'A';
                break;
            default:
                $keterangan = 'Invalid';
                break;
        }
        $collection = collect($resultDashboard);
        $ketua = $collection->where('kode_kelompok', $resultKode)->where('status', 'ketua');
        $ketua = $ketua->all();

        $laporan = LaporanKegiatan::where('kode_kelompok', $resultKode)->first();
        $rencanaKegiatan = RencanaKegiatan::where('kode_kelompok', $resultKode)->first();

        return view('mahasiswa.dashboard', ['key' => 'home', 'result' => $resultDashboard, 'resultmaster' => $resultmaster, 'ketua' => $ketua, 'nilai' => $nilai, 'keterangan' => $keterangan], compact('laporan', 'rencanaKegiatan'));
    }

    public function profile()
    {
        return view('mahasiswa.profile', ['key' => 'home']);
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/login');
    }
}
