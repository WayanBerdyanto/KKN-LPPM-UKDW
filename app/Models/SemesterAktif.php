<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterAktif extends Model
{
    use HasFactory;

    protected $table = 'semesteraktif';
    protected $fillable = [
        'kode_semester',
        'semester',
        'tahun_ajaran',
        'status',
    ];
}
