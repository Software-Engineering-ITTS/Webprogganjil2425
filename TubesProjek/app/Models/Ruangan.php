<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{

    // /** @use HasFactory<\Database\Factories\RuanganControllerFactory> */
    protected $fillable = [
        'nama',
        'deskripsi',
        'kapasitas',
        'status',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function ijinMasuks()
    {
        return $this->hasMany(IjinMasuk::class);
    }
}
