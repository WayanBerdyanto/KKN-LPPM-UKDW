<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKKN;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;

class JenisKKNController extends Controller
{
    public function jenisKKN()
    {
        $result = JenisKKN::orderBy('kode_jenis', 'desc')->paginate(15);
        $kode_semester = SemesterAktif::where('status', 'Aktif')->orderBy('kode_semester', 'asc')->get();
        return view('admin.jeniskkn', ['key' => 'jeniskkn', 'result' => $result, 'kode_semester' => $kode_semester]);
    }
    public function detailKKN($id)
    {
        $detail = JenisKKN::where('kode_jenis', $id)->first();
        return response()->json(['detail' => $detail]);
    }

    public function PostJenisKKN(Request $request)
    {
        $validate = $request->validate([
            'kode_jenis' => 'required | unique:JenisKKN',
            'nama_kkn' => 'required',
            'lokasi_kkn' => 'required',
        ]);

        if (!empty($validate)) {
            JenisKKN::create([
                'kode_jenis' => $request->kode_jenis,
                'nama_kkn' => $request->nama_kkn,
                'lokasi' => $request->lokasi_kkn,
            ]);
            return redirect('/admin/jeniskkn')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return redirect('/admin/jeniskkn')->with('toast_error', 'Gagal Menginputkan Data')->withInput();
        }
        return redirect('/admin/jeniskkn')->with('toast_error', 'Gagal Menginputkan Data')->withInput();
    }

    public function UpdateJenis($id)
    {
        $updateJenis = JenisKKN::where('kode_jenis', $id)->first();
        return response()->json(['updateJenis' => $updateJenis]);
    }

    public function PostUpdateJenisKKN(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_jenis' => 'required',
            'nama_kkn' => 'required',
            'lokasi_kkn' => 'required',
        ]);

        if (!empty($validate)) {
            JenisKKN::where('kode_jenis', $id)->update([
                'kode_jenis' => $request->kode_jenis,
                'nama_kkn' => $request->nama_kkn,
                'lokasi' => $request->lokasi_kkn,
            ]);
            return redirect('/admin/jeniskkn')->with('success', 'Data Berhasil Diupdate');
        }
        if ($validate->fails()) {
            return redirect('/admin/jeniskkn')->with('toast_error', 'Gagal Mengupdate Data')->withInput();
        }
        return redirect('/admin/jeniskkn')->with('toast_error', 'Gagal Mengupdate Data')->withInput();
    }

    public function DeleteJenisKKN($id)
    {
        jenisKKN::where('kode_jenis', $id)->delete();
        return redirect('/admin/jeniskkn')->with('success', 'Data Berhasil DiHapus');
    }
}
