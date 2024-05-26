<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\RencanaKegiatan;
use Illuminate\Http\Request;
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
            'file' => 'required',
        ]);
        // if (empty($validate)) {
        //     return redirect()->back()->with('toast_error', 'Data Gagal Di inputkan');
        // }
        // dd($request->file);
        // dd($file->getClientOriginalName());
        try {
            RencanaKegiatan::create([
                'kode_kelompok' => $request->kode_kelompok,
                'id_mahasiswa' => $request->id_mahasiswa,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'file' => $request->file,
                'komentar_dosen' => ''
            ]);
            return redirect()->back()->with('toast_success', 'Data Berhasil Di inputkan');
        } catch (Exception $e) {
            return response()->view('mahasiswa.rencanakegiatan', ['error' => $e->getMessage()], 403);
            throw $e;
        }

    }

    public function templaterencana()
    {
        $file = public_path('storage/RENCANA KEGIATAN KULIAH KERJA NYATA 2024.docx');
        return Response::download($file);
    }
}
