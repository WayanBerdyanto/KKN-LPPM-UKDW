<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function password(Request $request)
    {
        $id = Auth::guard('mahasiswa')->id();
        DB::table('mahasiswas')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($request->password),
            ]);

        return redirect()->route('settings')->with('success', 'Password berhasil diubah');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $id = Auth::guard('mahasiswa')->id();

        if ($id) {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');

                $image_info = getimagesize($foto);
                if ($image_info === false) {
                    return redirect()->route('settings')->with('errors', 'File yang diunggah bukan gambar yang valid');
                }

                $fileName = $foto->getClientOriginalName();
                $foto->move(public_path('img/mahasiswa'), $fileName);

                DB::table('mahasiswas')
                    ->where('id', $id)
                    ->update([
                        'foto' => $fileName,
                    ]);

                return redirect()->route('settings')->with('success', 'Foto berhasil di Upload');
            } else {
                return redirect()->route('settings')->with('errors', 'File foto tidak ditemukan');
            }
        } else {
            return redirect()->route('settings')->with('errors', 'Terjadi Kesalahan');
        }
    }

}
