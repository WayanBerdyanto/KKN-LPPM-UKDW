<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokKKN extends Model
{
    use HasFactory;

    protected $table = 'kelompokkkn';

    protected $fillable = [
        'kode_kelompok',
        'kode_jenis',
        'kode_semester',
        'id_dosen',
        'id_dosen2',
        'nama_kelompok',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kapasitas',
    ];
}
