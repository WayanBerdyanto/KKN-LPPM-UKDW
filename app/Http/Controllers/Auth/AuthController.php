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
                    return redirect('/admin')->with('success', 'Login Berhasil');
                    break;
                case $dosenAuthAttempt && Auth::guard('dosen')->user()->status === 'dosen':
                    return redirect('/dosen')->with('success', 'Login Berhasil');
                    break;
                default:
                    return redirect('/')->with('error', 'Tidak ada aksi yang sesuai');
                    break;
            }
        }
    
        return redirect('/login')->withInput()->with('error', 'Login Gagal');
    }
}
