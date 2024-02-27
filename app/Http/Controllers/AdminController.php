<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.main');
    }
    public function kelompok()
    {
        return view('admin.kelompok');
    }
    public function detailKelompok()
    {
        return view('admin.detailkelompok');
    }
    public function detailKelompokRencana()
    {
        return view('admin.rencana');
    }
    public function detailKelompokLogbook()
    {
        return view('admin.logbook');
    }
}
