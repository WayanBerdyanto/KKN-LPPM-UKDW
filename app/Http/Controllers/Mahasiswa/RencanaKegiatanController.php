<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\RencanaKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Mahasiswas;

class RencanaKegiatanController extends Controller
{
    public function rencanakegiatan()
    {
        $nim = Auth::guard('mahasiswa')->user()->username;
        $id = Auth::guard('mahasiswa')->user()->id;
        $file = RencanaKegiatan::where('id_mahasiswa', $id)->value('file');
        $file = $nim . '/' . $file;
        $resultRencana = RencanaKegiatan::where('id_mahasiswa', $id)->orderBy('tanggal', 'DESC')->get();
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
        return view('mahasiswa.rencanakegiatan', ['key' => 'kegiatan', 'resultKode' => $resultKode], compact('resultRencana', 'file'));
    }

    public function postrencanakegiatan(Request $request)
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
            RencanaKegiatan::create([
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
            return response()->view('mahasiswa.rencanakegiatan', ['error' => $e->getMessage()], 403);
            throw $e;
        }
    }

    public function detailrencanakegiatan($id)
    {
        $data = RencanaKegiatan::where('id_rencana', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function deleterencana($id){
        $nim = Auth::guard('mahasiswa')->user()->username;
        $rencana = RencanaKegiatan::where('id_rencana',$id)->value('file');

        if($rencana){
            Storage::disk('public')->delete($nim. '/' .$rencana);
        }
        RencanaKegiatan::where('id_rencana',$id)->delete();
        return redirect('/mahasiswa/rencanakegiatan')->with('toast_success', 'Kegaitan Berhasil Dihapus');
    }

    public function templaterencana()
    {
        $file = public_path('storage/RENCANA KEGIATAN KULIAH KERJA NYATA 2024.docx');
        return Response::download($file);
    }

    public function downloadfilerencana($filename)
    {
        $nim = Auth::guard('mahasiswa')->user()->username;

        $filePath = $nim . '/' . $filename;
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }
        abort(404, 'File not found');
    }

    public function rencanakelompok($id)
    {
        $ketua = RencanaKegiatan::where('kode_kelompok', $id)->value('id_mahasiswa');
        $nim = Mahasiswas::where('id',$ketua)->value('username');
        $file = RencanaKegiatan::where('kode_kelompok', $id)->value('file');
        $file = $nim . '/' . $file;
        $resultRencana = RencanaKegiatan::where('kode_kelompok', $id)->orderBy('tanggal', 'DESC')->get();
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
        return view('mahasiswa.rencanakegiatan', ['key' => 'home', 'resultKode' => $resultKode], compact('resultRencana', 'file'));
    }
}
