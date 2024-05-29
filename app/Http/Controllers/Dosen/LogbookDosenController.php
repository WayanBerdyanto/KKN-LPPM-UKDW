<?php

namespace App\Http\Controllers\Dosen;

use App\Models\KelompokKKN;

use App\Http\Controllers\Controller;
use App\Models\LogbookMahasiswa;
use App\Models\Mahasiswas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogbookDosenController extends Controller
{
    public function postKomentar($id, Request $request)
    {
        $logbook = LogbookMahasiswa::find($id);
        $id_mahasiswa = $logbook->id_mahasiswa;
        $validate = $request->validate([
            'komentar' => 'required'
        ]);
        if (!empty($validate)) {
            LogbookMahasiswa::where('id', $id)->update([
                'komentar_dosen' => $request->komentar
            ]);
            return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('success', 'Berhasil Menambahkan Komentar');
        }
        if ($validate->fails()) {
            return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('toast_error', 'Gagal Menambahkan Komentar')->withInput();
        }
        return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('toast_error', 'Gagal Menambahkan Komentar')->withInput();
    }
    public function detailLogbook($id)
    {
        $data = LogbookMahasiswa::where('id', $id)
            ->get();
        return response()->json(['detail' => $data]);
    }
    public function postUpdateKomentar($id, Request $request)
    {
        $logbook = LogbookMahasiswa::find($id);
        $id_mahasiswa = $logbook->id_mahasiswa;
        $validate = $request->validate([
            'komentar' => 'required'
        ]);
        if (!empty($validate))
        {

            LogbookMahasiswa::where('id', $id)->update([
                'komentar_dosen' => $request->komentar
            ]);
            return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('success', 'Berhasil Melakukan Update Komentar');
        }
         if ($validate->fails()) {
            return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
        }
        return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
    }
    public function deleteKomentar($id)
    {
        $logbook = LogbookMahasiswa::find($id);
        $id_mahasiswa = $logbook->id_mahasiswa;

        LogbookMahasiswa::where('id', $id)->update([
            'komentar_dosen' => null
        ]);

        return redirect('/dosen/kelompok/logbook/' . $id_mahasiswa)->with('success', 'Berhasil Menghapus Komentar');
    }
}
