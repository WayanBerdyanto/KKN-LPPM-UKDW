<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosens;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingDosenController extends Controller
{
    public function setting()
    {
        $id = Auth::guard('dosen')->id();
        $data = Dosens::find($id);
        return view('dosen.settings', ['key' => ''], ['data' => $data]);
    }
    public function updateProfile(Request $request)
    {
        $id = Auth::guard('dosen')->id();
        DB::table('dosens')
            ->where('id', $id)
            ->update([
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);
        return redirect('/dosen/setting')->with('success', 'Profile updated successfully');
    }
    public function password(Request $request)
    {
        $id = Auth::guard('dosen')->id();
        DB::table('dosens')
            ->where('id', $id)
            ->update([
                'password'=> Hash::make($request->password),
            ]);
        return redirect('/dosen/setting')->with('success', 'Profile updated successfully');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $id = Auth::guard('dosen')->id();

        if ($id) {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');

                $image_info = getimagesize($foto);
                if ($image_info === false) {
                    return redirect('dosen/setting')->with('errors', 'File yang diunggah bukan gambar yang valid');
                }

                $fileName = $foto->getClientOriginalName();
                $foto->move(public_path('img/dosen'), $fileName);

                DB::table('dosens')
                    ->where('id', $id)
                    ->update([
                        'foto' => $fileName,
                    ]);

                return redirect('dosen/setting')->with('success', 'Foto berhasil di Upload');
            } else {
                return rredirect('dosen/setting')->with('errors', 'File foto tidak ditemukan');
            }
        } else {
            return redirect('dosen/setting')->with('errors', 'Terjadi Kesalahan');
        }
    }
}
