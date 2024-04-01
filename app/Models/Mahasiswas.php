<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswas extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nim',
        'nama',
        'password',
        'prodi',
        'angkatan',
        'gender',
        'status',
        'alamat',
        'email',
        'no_telp',
        'role',
    ];

    protected $guard = 'mahasiswa';

}
