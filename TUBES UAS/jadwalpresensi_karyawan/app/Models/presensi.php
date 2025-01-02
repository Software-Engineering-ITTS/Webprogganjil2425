<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;

    protected $table = 'presensis';

    protected $fillable = [
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status_waktu',
        'status_hadir',
        'id_karyawan',
        'id_jadwal_kerja'
    ];

    protected $guarded = ['id'];

    public function jadwalKerja()
    {
        return $this->belongsTo(jadwal_kerja::class, 'id_jadwal_kerja', 'id');
    }

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class, 'id_karyawan');
    }
}
