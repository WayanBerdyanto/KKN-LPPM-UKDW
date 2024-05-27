<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKKN extends Model
{
    use HasFactory;

    protected $table = 'jeniskkn';
    protected $fillable = [
        'kode_jenis',
        'kode_semester',
        'nama_kkn',
        'lokasi',
    ];
}
