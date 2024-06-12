<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarDosenController extends Controller
{
    public function DaftarDosen(){
        $result = Dosens::All();
        return view('admin.daftardosen', ['key'=>'daftardosen'], compact('result'));
    }
}
