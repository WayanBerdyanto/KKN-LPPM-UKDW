<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function detailKelompok()
    {
        return view('admin.detailkelompok', ['key'=>'kelompok','active'=> 'rencana']);
    }
}
