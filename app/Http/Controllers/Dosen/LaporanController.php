<?php

namespace App\Http\Controllers\Dosen;

use App\Models\LaporanKegiatan;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function laporan($id)
    {
        $laporan = LaporanKegiatan::where('kode_kelompok', $id)->first();
        $id_mahasiswa = $laporan->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;
        $file = LaporanKegiatan::where('id_mahasiswa', $id_mahasiswa)->value('file');
        $file = $nim . '/' . $file;
        $resultRencana = LaporanKegiatan::where('kode_kelompok', $id)->orderBy('tanggal', 'DESC')->get();
        $resultKode = "kode kelompok tidak ditemukan";
        $kode_kel = DB::table('detailkelompokkkn as dk')
            ->join('mahasiswas as mh', 'dk.id_mahasiswa', '=', 'mh.id')
            ->select('dk.kode_kelompok', 'mh.nama')
            ->where('dk.id_mahasiswa', '=', $mahasiswa)
            ->get();
        if ($kode_kel->count() > 0) {
            $resultKode = $kode_kel[0]->kode_kelompok;
        }

        return view('dosen.laporankegiatan', ['key' => 'kelompok', 'resultKode' => $resultKode], compact('resultRencana', 'file'));
    }

    public function downloadlaporan($filename)
    {
        $laporan = LaporanKegiatan::where('file', $filename)->first();
        $id_mahasiswa = $laporan->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;

        $filePath = $nim . '/' . $filename;
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }
        abort(404, 'File not found');
    }
    public function jsonlaporan($id)
    {
        $data = LaporanKegiatan::where('id_laporan', $id)
            ->get();
        return response()->json(['detail' => $data]);
    }

    public function postkomentar(Request $request,$id)
    {
        $laporan = LaporanKegiatan::where('id_laporan', $id)->first();
        $id_kelompok = $laporan->kode_kelompok;
        $validate = $request->validate([
            'komentar' => 'required'
        ]);
        if (!empty($validate)) {

            LaporanKegiatan::where('id_laporan', $id)->update([
                'komentar_dosen' => $request->komentar
            ]);
            return redirect('/dosen/kelompok/laporan/' . $id_kelompok)->with('success', 'Berhasil Melakukan Update Komentar');
        }
        if ($validate->fails()) {
            return redirect('/dosen/kelompok/laporan/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
        }
        return redirect('/dosen/kelompok/laporan/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
    }
    public function deletekomentarlaporan($id)
    {
        $rencana = LaporanKegiatan::where('id_laporan', $id)->first();
        $id_kelompok = $rencana->kode_kelompok;

        LaporanKegiatan::where('id_laporan', $id)->update([
            'komentar_dosen' => null
        ]);

        return redirect('/dosen/kelompok/rencana/' . $id_kelompok)->with('success', 'Berhasil Menghapus Komentar');
    }

}
