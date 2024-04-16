<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function settings()
    {
        $id = Auth::guard('mahasiswa')->id();
        $data = Mahasiswas::find($id);
        return view('mahasiswa.settings', ['key' => ''],['data'=> $data]);
    }
    public function update(Request $request)
    {
        $id = Auth::guard('mahasiswa')->id();
        DB::table('mahasiswas')
            ->where('id', $id)
            ->update([
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);


        return redirect()->route('settings')->with('success', 'Profile updated successfully');
    }
}
