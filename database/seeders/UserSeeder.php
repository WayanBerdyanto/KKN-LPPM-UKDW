<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $faker = Faker::create('id_ID');
        DB::table("admins")->insert([
            [
                'username' => 'vino',
                'password' => bcrypt('12345678'),
                'status' => 'admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'wayan',
                'password' => bcrypt('12345678'),
                'status' => 'admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        DB::table("dosens")->insert([
            [
                'nip' => 'KD123456',
                'username' => 'wayandosen',
                'password' => bcrypt('12345678'),
                'nama' => 'Wayan Berdyanto',
                'status' => 'dosen',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nip' => 'KD654321',
                'username' => 'vinodosen',
                'password' => bcrypt('12345678'),
                'nama' => 'Vino Eko',
                'status' => 'dosen',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
        for ($i = 1; $i <= 30; $i++) {
            DB::table("mahasiswas")->insert([
                [
                    'username' => $faker->randomNumber(8, true),
                    'nama' => $faker->name,
                    'password' => bcrypt('12345678'),
                    'prodi' => $faker->city,
                    'angkatan' => '2021',
                    'gender' => 'Laki-laki',
                    'status' => 'anggota',
                    'role' => 'mahasiswa',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ]);
        }
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
                'created_at' => $now,
                'updated_at' => $now,
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
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
