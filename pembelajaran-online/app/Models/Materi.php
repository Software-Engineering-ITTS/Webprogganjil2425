<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'kelas_id'];

    // Relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke banyak siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class); // Relasi Materi ke Siswa
    }
}

