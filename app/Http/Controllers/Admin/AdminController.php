<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKKN;
use App\Models\Mahasiswas;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $result = SemesterAktif::orderBy('kode_semester', 'desc')->paginate(15);
        return view('admin.index', ['key' => 'home', 'result' => $result]);
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
            return redirect('/admin')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return redirect('/admin')->with('toast_error', 'Gagal Menginputkan Data')->withInput();
        }
        return redirect('/admin')->with('toast_error', 'Gagal Menginputkan Data')->withInput();
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
            return redirect('/admin')->with('success', 'Data Berhasil DiUpdate');
        }
        if ($validate->fails()) {
            return redirect('/admin')->with('toast_error', 'Gagal Update Data')->withInput();
        }
        return redirect('/admin')->with('toast_error', 'Gagal Update Data')->withInput();
    }

    public function DeleteSemester($id)
    {
        SemesterAktif::where('kode_semester', $id)->delete();
        return redirect('/admin')->with('success', 'Data berhasil ihapus');
    }
    public function kelompok()
    {
        return view('admin.kelompok', ['key' => 'kelompok']);
    }
    public function daftarmahasiswa()
    {
        $result = Mahasiswas::orderBy('id', 'desc')->paginate(15);
        return view('admin.daftarmahasiswa', ['key' => 'daftarmahasiswa', 'result' => $result]);
    }
    public function detailKelompok()
    {
        return view('admin.detailkelompok', ['key' => 'kelompok', 'active' => 'rencana']);
    }
    public function jenisKKN()
    {
        $result = JenisKKN::orderBy('kode_jenis', 'desc')->paginate(15);
        $kode_semester = SemesterAktif::orderBy('kode_semester', 'asc')->paginate(15);
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

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
