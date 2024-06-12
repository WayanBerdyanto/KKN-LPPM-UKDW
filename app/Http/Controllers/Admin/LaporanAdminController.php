<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;

class LaporanAdminController extends Controller
{
    public function jsonlaporan($id)
    {
        $data = LaporanKegiatan::where('id_laporan', $id)
            ->get();
        return response()->json(['detail' => $data]);
    }
    public function postkomentar(Request $request, $id)
    {
        $laporan = LaporanKegiatan::where('id_laporan',$id)->first();
        $id_kelompok = $laporan->kode_kelompok;
        $validate = $request->validate([
            'komentar' => 'required'
        ]);
        if (!empty($validate)) {

            LaporanKegiatan::where('id_laporan', $id)->update([
                'komentar_admin' => $request->komentar
            ]);
            return redirect('/admin/kelompok/laporan/' . $id_kelompok)->with('success', 'Berhasil Melakukan Update Komentar');
        }
        if ($validate->fails()) {
            return redirect('/admin/kelompok/laporan/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
        }
        return redirect('/admin/kelompok/laporan/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
    }
    public function deletekomentar($id)
    {
        $laporan = LaporanKegiatan::where('id_laporan',$id)->first();
        $id_kelompok = $laporan->kode_kelompok;

        LaporanKegiatan::where('id_laporan', $id)->update([
            'komentar_admin' => null
        ]);

        return redirect('/admin/kelompok/laporan/' . $id_kelompok)->with('success', 'Berhasil Menghapus Komentar');
    }
}
