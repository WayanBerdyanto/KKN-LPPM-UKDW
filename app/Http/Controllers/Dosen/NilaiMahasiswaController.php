<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\LogbookMahasiswa;
use App\Models\Mahasiswas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NilaiMahasiswaController extends Controller
{
    public function detailMahasiswa($id)
    {
        $data = Mahasiswas::find($id)->first();
        return response()->json(['detail' => $data]);

    }
    public function postnilai($id, Request $request)
    {
        $id_kelompok = DB::table('detailkelompokkkn')
            ->where('id_mahasiswa', $id)
            ->value('kode_kelompok');
        $validate = $request->validate([
            'nilai' => 'required'
        ]);
        if (!empty($validate)) {
            Mahasiswas::where('id', $id)->update([
                'nilai' => $request->nilai
            ]);
            return redirect('/dosen/kelompok/detail/' . $id_kelompok)->with('success', 'Berhasil Menambahkan Nilai');
        }
        if ($validate->fails()) {
            return redirect('/dosen/kelompok/detail/' . $id_kelompok)->with('toast_error', 'Gagal Menambahkan Nilai')->withInput();
        }
        return redirect('/dosen/kelompok/detail/' . $id_kelompok)->with('toast_error', 'Gagal Menambahkan Nilai')->withInput();
    }
    public function deleteNilai($id)
    {
        $id_kelompok = DB::table('detailkelompokkkn')
            ->where('id_mahasiswa', $id)
            ->value('kode_kelompok');
        Mahasiswas::find($id)->update([
            'nilai' => null
        ]);
        return redirect('/dosen/kelompok/detail/' . $id_kelompok)->with('success', 'Berhasil Menghapus nilai Nilai');
    }
}
