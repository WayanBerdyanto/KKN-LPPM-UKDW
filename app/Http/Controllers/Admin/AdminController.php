<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',['key'=>'home']);
    }
    public function kelompok()
    {
        return view('admin.kelompok', ['key'=> 'kelompok']);
    }
    public function daftarmahasiswa()
    {
        $result = Mahasiswas::orderBy('id', 'desc')->paginate(15);
        return view('admin.daftarmahasiswa', ['key'=> 'daftarmahasiswa', 'result'=> $result]);
    }

    // Start Search Mahasiswa
    public function search(Request $request){
        $cari = $request->search;
        $result = Mahasiswas::where('nama', 'like', '%' . $cari . '%')->paginate(15);
        $result->appends($request->all());
        return view('admin.daftarmahasiswa', ['key'=> 'daftarmahasiswa', 'result'=> $result]);
    }
    // End Search Mahasiswa
    public function detailKelompok()
    {
        return view('admin.detailkelompok', ['key'=>'kelompok','active'=> 'rencana']);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
