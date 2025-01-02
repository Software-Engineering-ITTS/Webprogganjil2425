<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'total_hadir',
        'total_alpha',
        'gaji_pokok',
        'potongan',
        'tunjangan',
        'bonus',
        'gaji_bersih',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
