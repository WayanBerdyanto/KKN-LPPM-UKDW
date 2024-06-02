<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanKegiatanController extends Controller
{
    public function laporankegiatan()
    {
        $nim = Auth::guard('mahasiswa')->user()->username;
        $id = Auth::guard('mahasiswa')->user()->id;
        $file = LaporanKegiatan::where('id_mahasiswa', $id)->value('file');
        $file = $nim . '/' . $file;
        $resultLaporan = LaporanKegiatan::orderBy('tanggal', 'DESC')->get();
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
        return view('mahasiswa.laporankegiatan', ['key' => 'kegiatan', 'resultKode' => $resultKode], compact('resultLaporan', 'file'));
    }
    public function detailLaporan($id)
    {
        $data = LaporanKegiatan::where('id_laporan', $id)->first();
        return response()->json(['data' => $data]);
    }
    public function postlaporan(Request $request)
    {
        $nim = Auth::guard('mahasiswa')->user()->username;

        $validate = $request->validate([
            'kode_kelompok' => 'required',
            'id_mahasiswa' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'file' => 'required',
        ]);
        $files_name = time() . '-' . $request->file('file')->getClientOriginalName();
        try {
            LaporanKegiatan::create([
                'kode_kelompok' => $request->kode_kelompok,
                'id_mahasiswa' => $request->id_mahasiswa,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'file' => $files_name,
                'komentar_dosen' => '',
            ]);
            $path = $request->file('file')->storeAs($nim, $files_name, 'public');
            return redirect()->back()->with('toast_success', 'Data Berhasil Di inputkan');
        } catch (Exception $e) {
            return response()->view('mahasiswa.laporankegiatan', ['error' => $e->getMessage()], 403);
            throw $e;
        }
    }
    public function postupdatelaporan($id, Request $request)
    {
        $validate = $request->validate([
            'kode_kelompok' => 'required',
            'id_mahasiswa' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'file' => 'required',
        ]);
        $nim = Auth::guard('mahasiswa')->user()->username;
        $file = $request->file('file');
        $file_name = time() . '-' . $file->getClientOriginalName();

        if ($validate != null) {
            $laporan = LaporanKegiatan::where('id_laporan', $id);

            if ($laporan) {
                $filePath = $nim . '/' . $file_name;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk()->delete($filePath);
                }

                $path = $file->storeAs($nim, $file_name, 'public');

                $laporan->update([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'tanggal' => $request->tanggal,
                    'file' => $file_name
                ]);

                return redirect()->back()->with('toast_success', 'Data berhasil di update');
            } else {
                return redirect()->back()->with('toast_error', 'Laporan tidak ditemukan');
            }
        }
    }


    public function deletelaporan($id)
    {
        $nim = Auth::guard('mahasiswa')->user()->username;
        $laporan = LaporanKegiatan::where('id_laporan', $id)->value('file');

        if ($laporan) {
            Storage::disk('public')->delete($nim . '/' . $laporan);
        }
        LaporanKegiatan::where('id_laporan', $id)->delete();
        return redirect('/mahasiswa/laporankegiatan')->with('toast_success', 'Laporan Berhasil Dihapus');
    }


}
