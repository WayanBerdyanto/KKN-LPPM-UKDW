<?php

namespace App\Http\Controllers\Dosen;

use App\Models\KelompokKKN;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use App\Models\LogbookMahasiswa;
use App\Models\Mahasiswas;
use App\Models\RencanaKegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KelompokDosenController extends Controller
{
    public function kelompok(Request $request)
    {
        $id_dosen = Auth::guard('dosen')->id();
        $value = $request->input('name');
        $result = DB::table('kelompokkkn AS kk')
            ->leftJoin('detailkelompokkkn AS dk', 'kk.kode_kelompok', '=', 'dk.kode_kelompok')
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
                'sa.*',
                DB::raw('COUNT(dk.id_mahasiswa) AS id_mahasiswa_terdaftar')
            )
            ->orderBy('sa.status', 'asc')
            ->groupBy('kk.kode_kelompok', 'd1.id', 'd2.id', 'j.kode_jenis')
            ->where(function ($query) use ($id_dosen, $value) {
                $query->where('kk.id_dosen', '=', $id_dosen)
                    ->orWhere('kk.id_dosen2', '=', $id_dosen)
                    ->orWhere('kk.nama_kelompok', 'LIKE', '%' . $value . '%');
            })
            ->get();
        return view('dosen.kelompok', ['key' => 'kelompok', 'result' => $result])->render();
    }
    public function detailKelompok($id)
    {
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
            ->where('kk.kode_kelompok', '=', $id)
            ->get();

        $resultDetail = DB::table('detailkelompokkkn AS dk')
            ->join('kelompokkkn as kk', 'kk.kode_kelompok', '=', 'dk.kode_kelompok')
            ->join('mahasiswas as mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->select('dk.*', 'kk.*', 'mh.*')
            ->where('dk.kode_kelompok', '=', $id)
            ->orderBy('mh.status', 'asc')
            ->get();
        $collection = collect($resultDetail);
        $ketua = $collection->where('kode_kelompok', $id)->where('status', 'ketua');
        $ketua = $ketua->all();
        $laporan = LaporanKegiatan::where('kode_kelompok', $id)->first();
        $rencana = RencanaKegiatan::where('kode_kelompok', $id)->first();
        return view('dosen.detailkelompok', ['key' => 'kelompok', 'active' => 'rencana', 'resultmaster' => $resultmaster, 'resultDetail' => $resultDetail, 'ketua' => $ketua,'laporan'=>$laporan,'rencana'=>$rencana]);
    }
    public function lihatlogbook($id)
    {
        $datakelompok = DB::table('detailkelompokkkn AS dk')
            ->join('mahasiswas AS mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->select('dk.kode_kelompok')
            ->where('mh.id', '=', $id)
            ->value('dk.kode_kelompok');
        $nama_kelompok = KelompokKKN::where('kode_kelompok', $datakelompok)
            ->value('nama_kelompok');
        $data = LogbookMahasiswa::orderBy('created_at', 'desc')->where('id_mahasiswa', $id)->get();
        $mahasiswa = Mahasiswas::where('id', $id)->first();
        return view('dosen.logbookmahasiswa', ['key' => 'kelompok', 'data' => $data, 'datakelompok' => $datakelompok, 'namakelompok' => $nama_kelompok, 'mahasiswa' => $mahasiswa]);
    }
}
