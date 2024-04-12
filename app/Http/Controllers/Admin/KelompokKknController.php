<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosens;
use App\Models\JenisKKN;
use App\Models\KelompokKKN;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokKknController extends Controller
{
    public function kelompok(Request $request)
    {
        $value = $request->input('name');

        $result = DB::select('
            SELECT
                d1.id AS id_dosen1,
                d1.nama AS nama_dosen1,
                d2.id AS id_dosen2,
                d2.nama AS nama_dosen2,
                kk.*,
                j.*,
                s.*
            FROM
                kelompokkkn kk
            JOIN
                jeniskkn j ON j.kode_jenis = kk.kode_jenis
            JOIN
                semesteraktif s ON s.kode_semester = kk.kode_semester
            LEFT JOIN
                dosens d1 ON d1.id = kk.id_dosen
            LEFT JOIN
                dosens d2 ON d2.id = kk.id_dosen2
            WHERE
                kk.nama_kelompok LIKE :nama_kelompok
        ', ['nama_kelompok' => '%' . $value . '%']);
        return view('admin.kelompok', ['key' => 'kelompok', 'result' => $result]);
    }

    public function detailKelompok($id)
    {
        $resultmaster = DB::select("
        SELECT
            d1.id AS id_dosen1,
            d1.nama AS nama_dosen1,
            d2.id AS id_dosen2,
            d2.nama AS nama_dosen2,
            kk.*,
            j.*,
            s.*
        FROM
            kelompokkkn kk
        JOIN
            jeniskkn j ON j.kode_jenis = kk.kode_jenis
        JOIN
            semesteraktif s ON s.kode_semester = kk.kode_semester
        LEFT JOIN
            dosens d1 ON d1.id = kk.id_dosen
        LEFT JOIN
            dosens d2 ON d2.id = kk.id_dosen2
        WHERE
            kk.kode_kelompok = '$id'");
        return view('admin.detailkelompok', ['key' => 'kelompok', 'active' => 'rencana', 'resultmaster' => $resultmaster]);
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
            'kapasitas' => 'required',
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
                'kapasitas' => $request->kapasitas,
            ]);
            return redirect('/admin/kelompok')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return Redirect::back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
        }
        return Redirect::back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
    }

}
