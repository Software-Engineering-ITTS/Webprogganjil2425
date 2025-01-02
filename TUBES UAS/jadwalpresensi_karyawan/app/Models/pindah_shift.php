<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pindah_shift extends Model
{
    use HasFactory;

    protected $table = 'pindah_shifts';

    protected $fillable = [
        'tanggal_awal',
        'shift_awal',
        'tanggal_pindah',
        'shift_pindah',
        'alasan',
        'status_pengajuan',
        'tanggal_pengajuan',
        'tanggal_proses',
        'id_karyawan',
        'id_jadwal_kerja'
    ];

    protected $guarded = ['id'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
