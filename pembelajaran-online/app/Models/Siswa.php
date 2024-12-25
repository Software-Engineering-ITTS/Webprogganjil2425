<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'no_telp', 'kelas_id'];

    // Relasi ke tabel `kelas`
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
