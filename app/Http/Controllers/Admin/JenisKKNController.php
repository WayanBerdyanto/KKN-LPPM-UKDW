<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKKN;
use App\Models\Mahasiswas;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisKKNController extends Controller
{
    public function jenisKKN()
    {
        $result = JenisKKN::orderBy('kode_jenis', 'desc')->paginate(15);
        $kode_semester = SemesterAktif::where('status', 'Aktif')->orderBy('kode_semester', 'asc')->get();
        return view('admin.jeniskkn', ['key' => 'jeniskkn', 'result' => $result, 'kode_semester' => $kode_semester]);
    }

    public function PostJenisKKN(Request $request)
    {
        $validate = $request->validate([
            'kode_jenis' => 'required | unique:JenisKKN',
            'kode_semester' => 'required',
            'nama_kkn' => 'required',
            'lokasi_kkn' => 'required',
        ]);

        if (!empty($validate)) {
            JenisKKN::create([
                'kode_jenis' => $request->kode_jenis,
                'kode_semester' => $request->kode_semester,
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
}
