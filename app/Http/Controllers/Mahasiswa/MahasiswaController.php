<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        $mahasiswa = array(
            array(
                "Nama" => "Budi Santoso",
                "NIM" => "123456789",
                "Prodi" => "Teknik Informatika",
                "Angkatan" => "2020",
                "Status" => "Anggota",
            ),
            array(
                "Nama" => "Ani Lestari",
                "NIM" => "987654321",
                "Prodi" => "Sastra Indonesia",
                "Angkatan" => "2021",
                "Status" => "Anggota",
            ),
            array(
                "Nama" => "Candra Wijaya",
                "NIM" => "1122334455",
                "Prodi" => "Teknik Mesin",
                "Angkatan" => "2022",
                "Status" => "Anggota",
            ),
            array(
                "Nama" => "Dina Putri",
                "NIM" => "6655443322",
                "Prodi" => "Ekonomi",
                "Angkatan" => "2023",
                "Status" => "Anggota",
            ),
            array(
                "Nama" => "Eko Wahyudi",
                "NIM" => "3322110099",
                "Prodi" => "Manajemen",
                "Angkatan" => "2024",
                "Status" => "Anggota",
            ),
        );

        return view('mahasiswa.dashboard', ['key' => 'home', 'result'=> $mahasiswa]);
    }
    public function logbook()
    {
        return view('mahasiswa.logbook', ['key' => 'logbook']);
    }
    public function tambah()
    {
        return view('mahasiswa.logbook');
    }

    public function profile()
    {
        return view('mahasiswa.profile', ['key' => '']);
    }

    public function settings(){
        return view('mahasiswa.settings', ['key' => '']);
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/login');
    }
}
