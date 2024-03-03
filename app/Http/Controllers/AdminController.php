<?php

namespace App\Http\Controllers;

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
    public function detailKelompokLogbook()
    {
        return view('admin.logbook', ['key'=>'kelompok', 'active'=>'logbook']);
    }
}
