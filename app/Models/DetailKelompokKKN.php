<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKelompokKKN extends Model
{
    use HasFactory;

    protected $table = 'detailKelompokkkn';

    protected $fillable = [
        'id_dtl',
        'kode_kelompok',
        'id_mahasiswa',
    ];
    
}
