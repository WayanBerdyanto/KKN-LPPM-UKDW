<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
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
}
