<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LihatLogbookController extends Controller
{
    public function LihatLogbook($id){
        return view('admin.lihatlogbook');
    }
}
