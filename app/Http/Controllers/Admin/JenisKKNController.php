<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKKN;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisKKNController extends Controller
{
    public function jenisKKN(Request $request)
    {
        $value = $request->input('value');
        $result = DB::table('jeniskkn')
            ->join('semesteraktif', 'jeniskkn.kode_semester', '=', 'semesteraktif.kode_semester')
            ->select('jeniskkn.*', 'semesteraktif.semester', 'semesteraktif.tahun_ajaran', 'semesteraktif.status')->orderBy('semesteraktif.status', 'asc')
            ->when($value, function ($query, $value) {
                if ($value !== "") {
                    return $query->where('semesteraktif.status', $value);
                }
            })
            ->paginate(10);
        $kode_semester = SemesterAktif::where('status', 'Aktif')
            ->orderBy('kode_semester', 'asc')->get();
        return view('admin.jeniskkn', ['key' => 'jeniskkn', 'result' => $result, 'kode_semester' => $kode_semester ,'value'=> $value]);
    }

    public function detailKKN($id)
    {
        $detail = DB::table('jeniskkn')
            ->join('semesteraktif', 'jeniskkn.kode_semester', '=', 'semesteraktif.kode_semester')
            ->select('jeniskkn.*', 'semesteraktif.semester', 'semesteraktif.tahun_ajaran', 'semesteraktif.status')
            ->where('kode_jenis', $id)->first();
        return response()->json(['detail' => $detail]);
    }

    public function PostJenisKKN(Request $request)
    {
        $validate = $request->validate([
            'kode_jenis' => 'required | unique:JenisKKN',
            'nama_kkn' => 'required',
            'kode_semester' => 'required',
            'lokasi_kkn' => 'required',
        ]);

        if (!empty($validate)) {
            JenisKKN::create([
                'kode_jenis' => $request->kode_jenis,
                'nama_kkn' => $request->nama_kkn,
                'kode_semester' => $request->kode_semester,
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
            'kode_semester' => 'required',
            'lokasi_kkn' => 'required',
        ]);

        if (!empty($validate)) {
            JenisKKN::where('kode_jenis', $id)->update([
                'kode_jenis' => $request->kode_jenis,
                'nama_kkn' => $request->nama_kkn,
                'kode_semester' => $request->kode_semester,
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
