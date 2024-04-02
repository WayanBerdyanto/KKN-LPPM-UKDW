<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'logbookmahasiswa';

    protected $fillable = [
        'id_mahasiswa',
        'judul',
        'deskripsi',
        'tanggal',
        'komentar_dosen',
        'komentar_admin',
    ];
}
