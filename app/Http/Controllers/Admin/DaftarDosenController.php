<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarDosenController extends Controller
{
    public function DaftarDosen(){
        $result = Dosens::All();
        return view('admin.daftardosen', ['key'=>'daftardosen'], compact('result'));
    }

    public function SearchDosen(Request $request){
        $cari = $request->search;
        $result = Dosens::where('nip', 'like', '%' . $cari . '%')->orWhere('nama', 'like', '%' . $cari . '%')->get();
        return view('admin.daftardosen', ['key'=>'daftardosen'], compact('result'));
    }

    public function FormInsertDosen(){
        return view('admin.forms.FormInsertDosen', ['key'=>'daftardosen']);
    }

    public function PostInsertDosen(Request $request){
        $validate = $request->validate([
            'nip' => 'required | unique:Dosens',
            'username' => 'required | unique:Dosens',
            'nama' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required | unique:Mahasiswas',
            'no_telp' => 'required',
        ]);
        if (!empty($validate)) {
            Dosens::create([
                'nip' => $request->nip,
                'username' => $request->username,
                'password' =>  Hash::make('password'),
                'nama' => $request->nama,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
            ]);
            return redirect('/admin/daftardosen')->with('toast_success', 'Data Berhasil Ditambahkan');
        }
        if ($validate->fails()) {
            return redirect('/admin/forms/FormInsertMhs')->with('toast_error', 'Username / Email Telah digunakan')->withInput();
        }
        return redirect('/admin/forms/FormInsertDosen')->with('toast_error', 'Inputkan Data Dengan Benar')->withInput();
    }

    public function FormUpdateDosen($id){
        $dosen = Dosens::where('id', $id)->first();
        return view('admin.forms.FormUpdateDosen', ['key'=>'daftardosen'], compact('dosen'));
    }

    public function PostUpdateDosen($id, Request $request){
        $validate = $request->validate([
            'nip' => 'required',
            'username' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required | unique:Mahasiswas',
            'no_telp' => 'required',
        ]);

        if (!empty($validate)) {
            Dosens::where('id', $id)->update([
                'nip' => $request->nip,
                'username' => $request->username,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_telp' => $request->no_telp
            ]);
            return redirect('/admin/daftardosen')->with('toast_success', 'Data Berhasil Diubah');
        }
        if ($validate->fails()) {
            return redirect('/admin/forms/FormInsertMhs')->with('toast_error', 'Username / Email Telah digunakan')->withInput();
        }
        return redirect('/admin/forms/FormInsertDosen')->with('toast_error', 'Inputkan Data Dengan Benar')->withInput();
    }

    public function DeleteDosen($id){
        Dosens::where('id', $id)->delete();
        return redirect('/admin/daftardosen')->with('toast_success', 'Data Berhasil DiHapus');
    }

}
