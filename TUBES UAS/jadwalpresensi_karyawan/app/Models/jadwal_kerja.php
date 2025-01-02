<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_kerja extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kerjas';

    protected $fillable = [
        'tanggal',
        'shift',
        'id_karyawan'
    ];

    protected $guarded = ['id'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
