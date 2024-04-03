<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("admins")->insert([
            [
                'username' => 'vino',
                'password' => bcrypt('12345678'),
                'status' => 'admin',
            ],
            [
                'username' => 'wayan',
                'password' => bcrypt('12345678'),
                'status' => 'admin',
            ],
        ]);

        DB::table("dosens")->insert([
            [
                'nip' => 'KD123456',
                'username' => 'wayandosen',
                'password' => bcrypt('12345678'),
                'nama' => 'Wayan Berdyanto',
                'status' => 'dosen',
            ],
            [
                'nip' => 'KD654321',
                'username' => 'vinodosen',
                'password' => bcrypt('12345678'),
                'nama' => 'Vino Eko',
                'status' => 'dosen',
            ]
        ]);
        DB::table("mahasiswas")->insert([
            [
                'username' => '72210481',
                'nama' => 'Wayan Berdyanto',
                'password' => bcrypt('12345678'),
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2021',
                'gender' => 'Laki-laki',
                'status' => 'ketua',
                'role' => 'mahasiswa',
            ],
            [
                'username' => '72210487',
                'nama' => 'Kalistus Alvino',
                'password' => bcrypt('12345678'),
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2021',
                'gender' => 'Laki-laki',
                'status' => 'anggota',
                'role' => 'mahasiswa',
            ]
        ]);


    }
}
