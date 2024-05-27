<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'rencanakegiatan';

    protected $fillable = [
        'id_rencana',
        'kode_kelompok',
        'id_mahasiswa',
        'judul',
        'deskripsi',
        'tanggal',
        'file',
        'komentar_dosen',
    ];
}
