<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosens;
use App\Models\JenisKKN;
use App\Models\KelompokKKN;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;

class KelompokKknController extends Controller
{
    public function kelompok()
    {
        return view('admin.kelompok', ['key' => 'kelompok']);
    }

    public function detailKelompok()
    {
        return view('admin.detailkelompok', ['key' => 'kelompok', 'active' => 'rencana']);
    }

    public function FormInsertKelompok()
    {
        $jenis = JenisKKN::All();
        $semester = SemesterAktif::where('status', 'Aktif')->get();
        $dosen = Dosens::All();
        return view('admin.forms.FormInsertKelompok', ['key' => 'kelompok', 'jenis' => $jenis, 'semester' => $semester, 'dosen' => $dosen]);
    }

    public function PostInsertKelompok(Request $request)
    {
        $validate = $request->validate([
            'kode_kelompok' => 'required | unique:Kelompokkkn',
            'kode_jenis' => 'required',
            'kode_semester' => 'required',
            'id_dosen' => 'required',
            'id_dosen2' => 'different:id_dosen',
            'nama_kelompok' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        if (!empty($validate)) {

            $kelompok = KelompokKKN::create([
                'kode_kelompok' => $request->kode_kelompok,
                'kode_jenis' => $request->kode_jenis,
                'kode_semester' => $request->kode_semester,
                'id_dosen' => $request->id_dosen,
                'id_dosen2' => $request->id_dosen2,
                'nama_kelompok' => $request->nama_kelompok,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
            ]);
            return redirect('/admin/kelompok')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return Redirect::back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
        }
        return Redirect::back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
    }

}
