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
                'kode_dosen' => '72210481',
                'username' => 'wayandosen',
                'password' => bcrypt('12345678'),
                'nama' => 'Wayan Berdyanto',
                'status' => 'dosen',
            ],
            [
                'kode_dosen' => '72210487',
                'username' => 'vinodosen',
                'password' => bcrypt('12345678'),
                'nama' => 'Vino Eko',
                'status' => 'dosen',
            ]
        ]);

        
    }
}
