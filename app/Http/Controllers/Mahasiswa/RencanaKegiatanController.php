<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class RencanaKegiatanController extends Controller
{
    public function rencanakegiatan()
    {
        $idMhs = Auth::guard('mahasiswa')->user()->id;
        $resultKode = "kode kelompok tidak ditemukan";
        $kode_kel = DB::table('detailkelompokkkn as dk')
            ->join('mahasiswas as mh', 'dk.id_mahasiswa', '=', 'mh.id')
            ->select('dk.kode_kelompok', 'mh.nama')
            ->where('dk.id_mahasiswa', '=', $idMhs)
            ->get();
        if ($kode_kel->count() > 0) {
            $resultKode = $kode_kel[0]->kode_kelompok;
        }
        return view('mahasiswa.rencanakegiatan', ['key' => 'kegiatan', 'resultKode' => $resultKode]);
    }

    public function postrencanakegiatan(Request $request)
    {
        $validate = $request->validate([
            'kode_kelompok' => 'required',
            'id_mahasiswa' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'required|file|mimes:docx|max:2048',
        ]);

        try {
            if (!empty($validate)) {
                
            }
        } catch (Exception $e) {
        }

    }

    public function templaterencana()
    {
        $file = public_path('storage/RENCANA KEGIATAN KULIAH KERJA NYATA 2024.docx');
        return Response::download($file);
    }
}
