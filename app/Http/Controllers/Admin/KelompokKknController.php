<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailKelompokKKN;
use App\Models\Dosens;
use App\Models\KelompokKKN;
use App\Models\LaporanKegiatan;
use App\Models\LogbookMahasiswa;
use App\Models\Mahasiswas;
use App\Models\RencanaKegiatan;
use App\Models\SemesterAktif;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokKknController extends Controller
{
    public function kelompok(Request $request)
    {
        $value = $request->input('name');
        $semester = SemesterAktif::orderBy('tahun_ajaran', 'desc')->get();
        $result = DB::table('kelompokkkn AS kk')
            ->leftJoin('detailkelompokkkn AS dk', 'kk.kode_kelompok', '=', 'dk.kode_kelompok')
            ->join('jeniskkn AS j', 'j.kode_jenis', '=', 'kk.kode_jenis')
            ->join('semesteraktif AS sa', 'sa.kode_semester', '=', 'j.kode_semester')
            ->leftJoin('dosens AS d1', 'd1.id', '=', 'kk.id_dosen')
            ->leftJoin('dosens AS d2', 'd2.id', '=', 'kk.id_dosen2')
            ->select(
                'd1.id AS id_dosen1',
                'd1.nama AS nama_dosen1',
                'd2.id AS id_dosen2',
                'd2.nama AS nama_dosen2',
                'kk.*',
                'j.*',
                'sa.*',
                DB::raw('COUNT(dk.id_mahasiswa) AS id_mahasiswa_terdaftar')
            )
            ->where('kk.nama_kelompok', 'LIKE', '%' . $value . '%')
            ->orWhere('sa.tahun_ajaran', 'LIKE', '%' . $value . '%')
            ->orderBy('sa.status', 'asc')
            ->groupBy('kk.kode_kelompok', 'd1.id', 'd2.id', 'j.kode_jenis')
            ->get();
        return view('admin.kelompok', ['key' => 'kelompok', 'result' => $result, 'semester' => $semester])->render();
    }

    public function detailKelompok($id)
    {
        $resultmaster = DB::table('kelompokkkn AS kk')
            ->join('jeniskkn AS j', 'j.kode_jenis', '=', 'kk.kode_jenis')
            ->join('semesteraktif AS sa', 'sa.kode_semester', '=', 'j.kode_semester')
            ->leftJoin('dosens AS d1', 'd1.id', '=', 'kk.id_dosen')
            ->leftJoin('dosens AS d2', 'd2.id', '=', 'kk.id_dosen2')
            ->select(
                'd1.id AS id_dosen1',
                'd1.nama AS nama_dosen1',
                'd2.id AS id_dosen2',
                'd2.nama AS nama_dosen2',
                'kk.*',
                'j.*',
                'sa.*'
            )
            ->where('kk.kode_kelompok', '=', $id)
            ->get();

        $resultDetail = DB::table('detailkelompokkkn AS dk')
            ->join('kelompokkkn as kk', 'kk.kode_kelompok', '=', 'dk.kode_kelompok')
            ->join('mahasiswas as mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->select('dk.*', 'kk.*', 'mh.*')
            ->where('dk.kode_kelompok', '=', $id)
            ->orderBy('mh.status', 'asc')
            ->get();
        $collection = collect($resultDetail);
        $ketua = $collection->where('kode_kelompok', $id)->where('status', 'ketua');
        $ketua = $ketua->all();

        $laporan = LaporanKegiatan::where('kode_kelompok', $id)->first();
        $rencanaKegiatan = RencanaKegiatan::where('kode_kelompok', $id)->first();

        return view('admin.detailkelompok', ['key' => 'kelompok', 'active' => 'rencana', 'resultmaster' => $resultmaster, 'resultDetail' => $resultDetail, 'ketua' => $ketua], compact('laporan', 'rencanaKegiatan'));
    }

    public function FormInsertKelompok()
    {
        $jenis = DB::table('jeniskkn AS jk')
            ->join('semesteraktif AS sa', 'sa.kode_semester', '=', 'jk.kode_semester')
            ->select('jk.kode_jenis', 'jk.nama_kkn')
            ->where('sa.status', '=', 'Aktif')
            ->get();
        $dosen = Dosens::All();
        return view('admin.forms.FormInsertKelompok', ['key' => 'kelompok', 'jenis' => $jenis, 'dosen' => $dosen]);
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

    public function formEditKelompok($kode_kelompok)
    {
        $data = KelompokKKN::where('kode_kelompok', $kode_kelompok)->first();
        $jenis = DB::table('jeniskkn AS jk')
            ->join('semesteraktif AS sa', 'sa.kode_semester', '=', 'jk.kode_semester')
            ->select('jk.kode_jenis', 'jk.nama_kkn')
            ->where('sa.status', '=', 'Aktif')
            ->get();
        $semester = SemesterAktif::where('status', 'Aktif')->get();
        $dosen = Dosens::All();

        return view('admin.forms.FormUpdateKelompok', ['key' => 'kelompok', 'data' => $data, 'jenis' => $jenis, 'semester' => $semester, 'dosen' => $dosen]);
    }

    public function postUpdateKelompok($id, Request $request)
    {
        $validate = $request->validate([
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
            KelompokKKN::where('kode_kelompok', $id)->update([
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
            return redirect('/admin/kelompok/detail/' . $id)->with('success', 'Data Kelompok Berhasil di Update');
        }
        if ($validate->fails()) {
            return redirect()->back()->with('toast_error', 'Terjadi Kesalahan')->withInput();
        } else {
            return redirect()->back()->withErrors($validate)->withInput();
        }
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
        $kode_kelompok = DB::table('detailkelompokkkn AS dk')
            ->join('mahasiswas AS mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->select('dk.kode_kelompok')
            ->where('mh.id', '=', $id)
            ->value('dk.kode_kelompok');
        $ketua = DB::table('detailkelompokkkn AS dk')
            ->join('mahasiswas AS mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->join('kelompokkkn AS K', 'k.kode_kelompok', '=', 'dk.kode_kelompok')
            ->select('dk.id_mahasiswa', 'dk.kode_kelompok', 'mh.nama', 'mh.status')
            ->where('dk.kode_kelompok', '=', $kode_kelompok)
            ->get();
        $takeketua = $ketua->contains('status', 'ketua');
        if ($takeketua) {
            return redirect()->back()->with('toast_info', 'Ketua Sudah Dipilih');
        } else {
            Mahasiswas::where('id', $id)->update([
                'status' => 'ketua',
            ]);
            return redirect()->back()->with('toast_success', 'Berhasil Memilih Ketua');
        }

    }

    public function PilihAnggota($id)
    {
        Mahasiswas::where('id', $id)->update([
            'status' => 'anggota',
        ]);
        return redirect()->back()->with('toast_success', 'Berhasil DiUpdate');
    }

    public function lihatlogbook($id)
    {
        $datakelompok = DB::table('detailkelompokkkn AS dk')
            ->join('mahasiswas AS mh', 'mh.id', '=', 'dk.id_mahasiswa')
            ->select('dk.kode_kelompok')
            ->where('mh.id', '=', $id)
            ->value('dk.kode_kelompok');
        $nama_kelompok = KelompokKKN::where('kode_kelompok', $datakelompok)
            ->value('nama_kelompok');
        $data = LogbookMahasiswa::orderBy('tanggal', 'desc')->where('id_mahasiswa', $id)->get();
        $mahasiswa = Mahasiswas::where('id', $id)->first();
        return view('admin.logbookmahasiswa', ['key' => 'kelompok', 'data' => $data, 'datakelompok' => $datakelompok, 'namakelompok' => $nama_kelompok, 'mahasiswa' => $mahasiswa]);
    }

    public function detailrencana($id)
    {
        $rencana = RencanaKegiatan::where('kode_kelompok', $id)->first();
        $id_mahasiswa = $rencana->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;
        $file = RencanaKegiatan::where('id_mahasiswa', $id)->value('file');
        $file = $nim . '/' . $file;
        $resultRencana = RencanaKegiatan::where('kode_kelompok', $id)->orderBy('tanggal', 'DESC')->get();
        $resultKode = "kode kelompok tidak ditemukan";
        $kode_kel = DB::table('detailkelompokkkn as dk')
            ->join('mahasiswas as mh', 'dk.id_mahasiswa', '=', 'mh.id')
            ->select('dk.kode_kelompok', 'mh.nama')
            ->where('dk.id_mahasiswa', '=', $mahasiswa)
            ->get();
        if ($kode_kel->count() > 0) {
            $resultKode = $kode_kel[0]->kode_kelompok;
        }

        return view('admin.rencana', ['key' => 'kelompok', 'resultKode' => $resultKode], compact('resultRencana', 'file'));
    }

    public function AdminDownloadRencana($filename)
    {
        $rencana = RencanaKegiatan::where('file', $filename)->first();
        $id_mahasiswa = $rencana->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;

        $filePath = $nim. '/' .$filename;
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }
        abort(404, 'File not found');
    }

    public function detaillaporan($id)
    {
        $laporan = LaporanKegiatan::where('kode_kelompok', $id)->first();
        $id_mahasiswa = $laporan->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;
        $file = LaporanKegiatan::where('id_mahasiswa', $id)->value('file');
        $file = $nim . '/' . $file;
        $resultLaporan = LaporanKegiatan::where('kode_kelompok',$id)->orderBy('tanggal', 'DESC')->get();
        $resultKode = "kode kelompok tidak ditemukan";
        $kode_kel = DB::table('detailkelompokkkn as dk')
            ->join('mahasiswas as mh', 'dk.id_mahasiswa', '=', 'mh.id')
            ->select('dk.kode_kelompok', 'mh.nama')
            ->where('dk.id_mahasiswa', '=', $mahasiswa)
            ->get();
        if ($kode_kel->count() > 0) {
            $resultKode = $kode_kel[0]->kode_kelompok;
        }

        return view('admin.laporan', ['key' => 'kelompok', 'resultKode' => $resultKode], compact('resultLaporan', 'file'));
    }

    public function AdminDownloadLaporan($filename)
    {
        $laporan = LaporanKegiatan::where('file', $filename)->first();
        $id_mahasiswa = $laporan->id_mahasiswa;
        $mahasiswa = Mahasiswas::where('id', $id_mahasiswa)->first();
        $nim = $mahasiswa->username;

        $filePath = $nim . '/' . $filename;
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }
        abort(404, 'File not found');
    }
}
