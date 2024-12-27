<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'pemeliharaan';

    protected $fillable = [
        'aset_id',
        'lokasi_id',
        'tanggal_pemeliharaan',
        'jenis_pemeliharaan',
        'deskripsi_masalah',
        'tindakan',
        'status',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
