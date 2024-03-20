<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admins;
use App\Models\Dosens;

class AuthController extends Controller
{
    public function index(){
        return view('auth.auth');
    }

    public function postLogin(Request $request){
        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $adminAuthAttempt = Auth::guard('admin')->attempt($validate);
        $dosenAuthAttempt = Auth::guard('dosen')->attempt($validate);

        if ($adminAuthAttempt || $dosenAuthAttempt) {
            $request->session()->regenerate();
            switch (true) {
                case $adminAuthAttempt && Auth::guard('admin')->user()->status === 'admin':
                    $user = Auth::guard('admin')->user()->username;
                    alert()->success('Login Berhasil', 'Selamat datang, Admin ' . $user .' 😃');
                    return redirect('/admin');
                    break;
                case $dosenAuthAttempt && Auth::guard('dosen')->user()->status === 'dosen':
                    $user = Auth::guard('dosen')->user()->username;
                    alert()->success('Login Berhasil', 'Selamat datang, ' . $user .' 😃');
                    return redirect('/dosen');
                    break;
                default:
                    toast('Tidak ada aksi yang sesuai','error');
                    return redirect('/');
                    break;
            }
        }

        toast('Login Gagal','error');
        return redirect('/login')->withInput();
    }
}
