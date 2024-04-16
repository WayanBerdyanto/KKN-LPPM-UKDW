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
        'id',
        'username',
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
        'foto',
    ];

    protected $guard = 'mahasiswa';
}
