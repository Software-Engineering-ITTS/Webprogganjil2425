<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    // Mendefinisikan atribut yang dapat diisi secara massal
    protected $fillable = ['judul', 'deskripsi', 'kelas_id'];

    // Relasi satu ke satu (banyak Materi terkait dengan satu Kelas)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class); // Materi ini dimiliki oleh satu Kelas
    }

    // Relasi satu ke banyak dengan model Siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class); // Satu Materi dapat terkait dengan banyak Siswa
    }
}
