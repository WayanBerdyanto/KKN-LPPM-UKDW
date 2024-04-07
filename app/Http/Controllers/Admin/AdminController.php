<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', ['key' => 'home']);
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

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
