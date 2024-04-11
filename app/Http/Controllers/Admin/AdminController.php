<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswas;
use App\Models\SemesterAktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', ['key' => 'home']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
    }
}
