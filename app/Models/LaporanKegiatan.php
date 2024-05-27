<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'laporankegiatan';

    protected $fillable = [
        'id_laporan',
        'kode_kelompok',
        'id_mahasiswa',
        'judul',
        'deskripsi',
        'tanggal',
        'file',
        'komentar_dosen',
    ];
}
