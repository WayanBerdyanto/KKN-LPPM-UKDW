<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;

class DaftarMahasiswaController extends Controller
{
    // Start Search Mahasiswa
    public function search(Request $request)
    {
        $cari = $request->search;
        $result = Mahasiswas::where('nama', 'like', '%' . $cari . '%')->paginate(15);
        $result = Mahasiswas::where('username', 'like', '%' . $cari . '%')->paginate(15);
        $result->appends($request->all());
        return view('admin.daftarmahasiswa', ['key' => 'daftarmahasiswa', 'result' => $result]);
    }
    // End Search Mahasiswa

    // Start Detail Mahasiswa
    public function DetailMahasiswa($id)
    {
        $detail = Mahasiswas::where('id', $id)->first();
        return response()->json(['detail' => $detail]);
    }
    // END Detail Mahasiswa
    public function insertMhs()
    {
        $prodi = array(
            'Filsafat Keahlian',
            'Arsitektur',
            'Desain Produk',
            'Biologi',
            'Manajemen',
            'Akuntansi',
            'Informatika',
            'Sistem Informasi',
            'Kedokteran',
            'Pendidikan Bahasa Inggris',
            'Studi Humanitas',
        );
        $angkatan = array(
            '2022',
            '2021',
            '2020',
            '2019',
            '2018',
            '2017',
            '2016',
        );
        return view('admin.forms.FormInsertMhs', ['key' => 'daftarmahasiswa', 'prodi' => $prodi, 'angkatan' => $angkatan]);
    }
    public function PostInsertMhs(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required | unique:Mahasiswas',
            'nama' => 'required',
            'email' => 'required | unique:Mahasiswas',
            'prodi' => 'required',
            'gender' => 'required',
            'angkatan' => 'required',
        ]);
        if (!empty($validate)) {
            Mahasiswas::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi' => $request->prodi,
                'gender' => $request->gender,
                'angkatan' => $request->angkatan,
            ]);
            return redirect('/admin/daftarmahasiswa')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return redirect('/admin/forms/FormInsertMhs')->with('toast_error', 'Username / Email Telah digunakan')->withInput();
        }
        return redirect('/admin/forms/FormInsertMhs')->with('toast_error', 'Inputkan Data Dengan Benar')->withInput();
    }

    public function updateMhs($id)
    {
        $prodi = array(
            'Filsafat Keahlian',
            'Arsitektur',
            'Desain Produk',
            'Biologi',
            'Manajemen',
            'Akuntansi',
            'Informatika',
            'Sistem Informasi',
            'Kedokteran',
            'Pendidikan Bahasa Inggris',
            'Studi Humanitas',
        );
        $angkatan = array(
            '2022',
            '2021',
            '2020',
            '2019',
            '2018',
            '2017',
            '2016',
        );
        $result = Mahasiswas::where('id', $id)->first();
        return view('admin.forms.FormUpdateMhs', ['key' => 'daftarmahasiswa', 'prodi' => $prodi, 'angkatan' => $angkatan, 'result' => $result]);
    }

    public function PostUpdateMhs($id, Request $request)
    {

        $validate = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'prodi' => 'required',
            'gender' => 'required',
            'angkatan' => 'required',
        ]);
        if (!empty($validate)) {
            Mahasiswas::where('id', $id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi' => $request->prodi,
                'gender' => $request->gender,
                'angkatan' => $request->angkatan,
            ]);
            return redirect('/admin/daftarmahasiswa')->with('success', 'Data Berhasil DiUpdate');
        }
        if ($validate->fails()) {
            return redirect()->back()->with('toast_error', 'Username / Email Telah digunakan')->withInput();
        } else {
            return redirect()->back()->withErrors($validate)->withInput();
        }
    }

    public function ResetPassword($id)
    {
        Mahasiswas::where('id', $id)->update([
            'password' => bcrypt('12345678'),
        ]);
        return redirect('/admin/daftarmahasiswa')->with('toast_success', 'Password Berhasil di Reset');
    }

    public function DeleteMahasiswa($id)
    {
        Mahasiswas::where('id', $id)->delete();
        return redirect('/admin/daftarmahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
