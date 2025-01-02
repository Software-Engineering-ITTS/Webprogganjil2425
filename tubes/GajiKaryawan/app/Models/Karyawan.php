<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $fillable = [
        'nama',
        'jabatan',
        'gaji_pokok',
        'tunjangan',
    ];

    // Relasi ke tabel presensi
    public function presensis()
    {
        return $this->hasMany(Presensi::class, 'karyawan_id', 'id');
    }

    // Relasi ke tabel gaji
    public function gaji()
    {
        return $this->hasOne(Gaji::class);
    }

}
