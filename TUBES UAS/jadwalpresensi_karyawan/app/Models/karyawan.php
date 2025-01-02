<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'divisi',
        'alamat',
        'no_telp',
        'email',
        'password',
        'foto'
    ];

    protected $guarded = ['id'];
}
