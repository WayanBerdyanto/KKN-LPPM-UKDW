<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;

use App\Models\Mahasiswas;
use App\Models\RencanaKegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RencanaController extends Controller
{
    public function detailrencana($id)
    {
        $rencana = RencanaKegiatan::where('kode_kelompok', $id)->first();
        $id_mahasiswa = $rencana->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;
        $file = RencanaKegiatan::where('id_mahasiswa', $id)->value('file');
        $file = $nim . '/' . $file;
        $resultRencana = RencanaKegiatan::where('kode_kelompok', $id)->orderBy('tanggal', 'DESC')->get();
        $resultKode = "kode kelompok tidak ditemukan";
        $kode_kel = DB::table('detailkelompokkkn as dk')
            ->join('mahasiswas as mh', 'dk.id_mahasiswa', '=', 'mh.id')
            ->select('dk.kode_kelompok', 'mh.nama')
            ->where('dk.id_mahasiswa', '=', $mahasiswa)
            ->get();
        if ($kode_kel->count() > 0) {
            $resultKode = $kode_kel[0]->kode_kelompok;
        }

        return view('dosen.rencanakegiatan', ['key' => 'kelompok', 'resultKode' => $resultKode], compact('resultRencana', 'file'));
    }
    public function dosendownload($filename)
    {
        $rencana = RencanaKegiatan::where('file', $filename)->first();
        $id_mahasiswa = $rencana->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;

        $filePath = $nim . '/' . $filename;
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }
        abort(404, 'File not found');
    }
    public function jsonrencana($id)
    {
        $data = RencanaKegiatan::where('id_rencana', $id)
            ->get();
        return response()->json(['detail' => $data]);
    }
    public function postkomentar(Request $request, $id)
    {
        $rencana = RencanaKegiatan::where('id_rencana',$id)->first();
        $id_kelompok = $rencana->kode_kelompok;
        $validate = $request->validate([
            'komentar' => 'required'
        ]);
        if (!empty($validate)) {

            RencanaKegiatan::where('id_rencana', $id)->update([
                'komentar_dosen' => $request->komentar
            ]);
            return redirect('/dosen/kelompok/rencana/' . $id_kelompok)->with('success', 'Berhasil Melakukan Update Komentar');
        }
        if ($validate->fails()) {
            return redirect('/dosen/kelompok/rencana/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
        }
        return redirect('/dosen/kelompok/rencana/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
    }
    public function deletekomentarrencana($id)
    {
        $rencana = RencanaKegiatan::where('id_rencana',$id)->first();
        $id_kelompok = $rencana->kode_kelompok;

        RencanaKegiatan::where('id_rencana', $id)->update([
            'komentar_dosen' => null
        ]);

        return redirect('/dosen/kelompok/rencana/' . $id_kelompok)->with('success', 'Berhasil Menghapus Komentar');
    }
}
