<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterAktifController extends Controller
{
    public function SemesterAktif(){
        $result = SemesterAktif::orderBy('kode_semester', 'desc')->paginate(15);
        return view('admin.semesteraktif', ['key' =>'semesteraktif', 'result' => $result]);
    }
    public function PostSemesterAktif(Request $request)
    {
        $validate = $request->validate([
            'kode_semester' => 'required | unique:SemesterAktif',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required',
        ]);

        if (!empty($validate)) {
            SemesterAktif::create([
                'kode_semester' => $request->kode_semester,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
                'status' => $request->status,
            ]);
            return redirect('/admin/semesteraktif')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return redirect('/admin/semesteraktif')->with('toast_error', 'Gagal Menginputkan Data')->withInput();
        }
        return redirect('/admin/semesteraktif')->with('toast_error', 'Gagal Menginputkan Data')->withInput();
    }

    public function UpdateSemester($id)
    {
        $update = SemesterAktif::where('kode_semester', $id)->first();
        return response()->json(['update' => $update]);
    }

    public function PostUpdateSemester($id, Request $request)
    {
        $validate = $request->validate([
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required',
        ]);

        if (!empty($validate)) {
            SemesterAktif::where('kode_semester', $id)->update([
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
                'status' => $request->status,
            ]);
            return redirect('/admin/semesteraktif')->with('success', 'Data Berhasil DiUpdate');
        }
        if ($validate->fails()) {
            return redirect('/admin/semesteraktif')->with('toast_error', 'Gagal Update Data')->withInput();
        }
        return redirect('/admin/semesteraktif')->with('toast_error', 'Gagal Update Data')->withInput();
    }

    public function DeleteSemester($id)
    {
        try {
            SemesterAktif::where('kode_semester', $id)->delete();
            return redirect('/admin/semesteraktif')->with('success', 'Data berhasil Dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/admin/semesteraktif')->with('error', 'Tidak dapat menghapus semester ini karena masih terdapat entri terkait di Jenis KKN');
        }
    }
}
