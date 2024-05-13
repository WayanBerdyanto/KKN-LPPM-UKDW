<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\LogbookMahasiswa;

class LogbookController extends Controller
{

    public function logbook()
    {
        $result = LogbookMahasiswa::orderBy('id', 'desc')->get();
        return view('mahasiswa.logbook', ['key' => 'logbook', 'result' => $result]);
    }


    public function postLogbook(Request $request)
    {
        $validate = $request->validate([
            'idMhs' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
        ]);
        if (!empty($validate)) {
            LogbookMahasiswa::create([
                'id_mahasiswa' => $request->idMhs,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
            ]);
            return redirect()->back()->with('toast_success', 'Logbook Berhasil ditambahkan');
        } else {
            return redirect()->back()->withErrors($validate)->withInput();
        }
    }

    public function detailLogbook($id)
    {
        $id_mahasiswa = Auth::guard('mahasiswa')->id();
        $data = LogbookMahasiswa::where('id', $id)
        ->where('id_mahasiswa', $id_mahasiswa)
        ->first();
        return response()->json(['detail' => $data]);
    }
    public function updateLogbook($id)
    {
        $id_mahasiswa = Auth::guard('mahasiswa')->id();
        $data = LogbookMahasiswa::where('id', $id)
        ->where('id_mahasiswa', $id_mahasiswa)
        ->first();
        return response()->json(['detail' => $data]);
    }
    public function postUpdateLogbook($id, Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        if (!empty($validate)) {
            LogbookMahasiswa::where('id', $id)->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
            ]);
            return redirect('/mahasiswa/logbook')->with('success', 'Data Berhasil DiUpdate');
        }
        if ($validate->fails()) {
            return redirect('/mahasiswa/logbook')->with('toast_error', 'Gagal Update Data')->withInput();
        }
        return redirect('/mahasiswa/logbook')->with('toast_error', 'Gagal Update Data')->withInput();
    }

    public function deletelogbook($id)
    {
        LogbookMahasiswa::where('id', $id)->delete();
        return redirect('/mahasiswa/logbook')->with('success', 'Data Berhasil DiHapus');
    }
}
