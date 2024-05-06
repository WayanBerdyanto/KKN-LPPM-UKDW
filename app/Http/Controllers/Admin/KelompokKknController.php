<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailKelompokKKN;
use App\Models\Dosens;
use App\Models\JenisKKN;
use App\Models\KelompokKKN;
use App\Models\Mahasiswas;
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
            COUNT(dk.id_mahasiswa) AS id_mahasiswa_terdaftar
        FROM
            kelompokkkn kk
        LEFT JOIN
            detailkelompokkkn dk ON kk.kode_kelompok = dk.kode_kelompok
        JOIN
            jeniskkn j ON j.kode_jenis = kk.kode_jenis
        LEFT JOIN
            dosens d1 ON d1.id = kk.id_dosen
        LEFT JOIN
            dosens d2 ON d2.id = kk.id_dosen2
        WHERE
            kk.nama_kelompok LIKE :nama_kelompok
        GROUP BY
            kk.kode_kelompok, d1.id, d2.id, j.kode_jenis', ['nama_kelompok' => '%' . $value . '%']);
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

        $resultDetail = DB::select(
            "SELECT
                dk.*,
                kk.*,
                mh.*
                FROM detailkelompokkkn dk
                JOIN kelompokkkn kk ON kk.kode_kelompok = dk.kode_kelompok
                JOIN mahasiswas mh ON mh.id = dk.id_mahasiswa
                WHERE dk.kode_kelompok = '$id'"
        );
        $collection = collect($resultDetail);
        $ketua = $collection->where('kode_kelompok', $id)->where('status', 'ketua');
        $ketua = $ketua->all();
        return view('admin.detailkelompok', ['key' => 'kelompok', 'active' => 'rencana', 'resultmaster' => $resultmaster, 'resultDetail' => $resultDetail, 'ketua' => $ketua]);
    }

    public function FormInsertKelompok()
    {
        $jenis = JenisKKN::All();
        $dosen = Dosens::All();
        return view('admin.forms.FormInsertKelompok', ['key' => 'kelompok', 'jenis' => $jenis,'dosen' => $dosen]);
    }

    public function PostInsertKelompok(Request $request)
    {
        $validate = $request->validate([
            'kode_kelompok' => 'required | unique:Kelompokkkn',
            'kode_jenis' => 'required',
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
            return redirect()->back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
        }
        return redirect()->back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
    }

    public function DataInsertKelompok(Request $request, $id)
    {
        $cari = $request->search;
        $id_mahasiswa_terdaftar = DetailKelompokKKN::pluck('id_mahasiswa')->all();

        $result = Mahasiswas::orderBy('id', 'desc')
            ->where('username', 'like', '%' . $cari . '%')
            ->whereNotIn('id', $id_mahasiswa_terdaftar)
            ->get();

        $resultDetail = DB::select(
            "SELECT
            dk.*,
            kk.*,
            mh.*
            FROM detailkelompokkkn dk
            JOIN kelompokkkn kk ON kk.kode_kelompok = dk.kode_kelompok
            JOIN mahasiswas mh ON mh.id = dk.id_mahasiswa
            WHERE dk.kode_kelompok = '$id'"
        );
        return view('admin.datainsertkelompok', ['key' => 'kelompok', 'result' => $result, 'id' => $id, 'resultDetail' => $resultDetail]);
    }

    public function PostDataKelompok(Request $request, $id)
    {
        $validate = $request->validate([
            'id_mahasiswa' => 'required',
        ]);

        $existingData = DetailKelompokKKN::where('id_mahasiswa', $request->id_mahasiswa)->exists();

        if ($existingData) {
            return redirect()->back()->with('toast_error', 'Mahasiswa sudah ada dalam Kelompok');
        }

        if (!empty($validate)) {
            DetailKelompokKKN::create([
                'kode_kelompok' => $id,
                'id_mahasiswa' => $request->id_mahasiswa,
            ]);
            return redirect()->back()->with('toast_success', 'Berhasil Menginputkan Data');
        }
        return redirect()->back()->with('toast_error', 'Gagal Menginputkan Data')->withInput($request->input());
    }

    public function DeleteDataKelompok($id)
    {
        DetailKelompokKKN::where('id_dtl', $id)->delete();
        return redirect()->back()->with('toast_success', 'Berhasil menghapus Data');
    }
    public function PilihKetua($id)
    {
        Mahasiswas::where('id', $id)->update([
            'status' => 'ketua',
        ]);
        return redirect()->back()->with('toast_success', 'Berhasil Memilih Ketua');
    }

    public function PilihAnggota($id)
    {
        Mahasiswas::where('id', $id)->update([
            'status' => 'anggota',
        ]);
        return redirect()->back()->with('toast_success', 'Berhasil DiUpdate');
    }

    public function formEditKelompok($kode_kelompok)
    {
        $data = KelompokKKN::where('kode_kelompok', $kode_kelompok)->first();
        $jenis = JenisKKN::All();
        $semester = SemesterAktif::where('status', 'Aktif')->get();
        $dosen = Dosens::All();

        return view('admin.forms.FormUpdateKelompok', ['key' => 'kelompok', 'data' => $data, 'jenis' => $jenis, 'semester' => $semester, 'dosen' => $dosen]);
    }

    public function postUpdateKelompok($id, Request $request)
    {
        $validate = $request->validate([
            'kode_jenis' => 'required',
            'kode_semester' => 'required',
            'id_dosen' => 'required',
            'id_dosen2' => 'required',
            'nama_kelompok' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kapasitas' => 'required',
        ]);
        if (!empty($validate)) {
            KelompokKKN::where('kode_kelompok', $id)->update([
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
            return redirect('admin/kelompok')->with('success', 'Data Kelompok Berhasil di Update');
        }
        if ($validate->fails()) {
            return redirect()->back()->with('toast_error', 'Terjadi Kesalahan')->withInput();
        } else {
            return redirect()->back()->withErrors($validate)->withInput();
        }
    }

}
