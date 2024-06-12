<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RencanaKegiatan;
use Illuminate\Http\Request;

class RencanaAdminController extends Controller
{
    public function jsonrencana($id)
    {
        $data = RencanaKegiatan::where('id_rencana', $id)
            ->get();
        return response()->json(['detail' => $data]);
    }
    public function postkomentar(Request $request, $id)
    {
        $rencana = RencanaKegiatan::where('id_rencana',$id)->first();
        $id_kelompok = $rencana->kode_kelompok;
        $validate = $request->validate([
            'komentar' => 'required'
        ]);
        if (!empty($validate)) {

            RencanaKegiatan::where('id_rencana', $id)->update([
                'komentar_admin' => $request->komentar
            ]);
            return redirect('/admin/kelompok/rencana/' . $id_kelompok)->with('success', 'Berhasil Melakukan Update Komentar');
        }
        if ($validate->fails()) {
            return redirect('/admin/kelompok/rencana/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
        }
        return redirect('/admin/kelompok/rencana/' . $id_kelompok)->with('toast_error', 'Gagal Melakukan Update Komentar')->withInput();
    }
    public function deletekomentar($id)
    {
        $rencana = RencanaKegiatan::where('id_rencana',$id)->first();
        $id_kelompok = $rencana->kode_kelompok;

        RencanaKegiatan::where('id_rencana', $id)->update([
            'komentar_admin' => null
        ]);

        return redirect('/admin/kelompok/rencana/' . $id_kelompok)->with('success', 'Berhasil Menghapus Komentar');
    }
}
