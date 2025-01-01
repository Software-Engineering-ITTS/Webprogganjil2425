<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Mendefinisikan atribut yang dapat diisi secara massal
    protected $fillable = ['nama', 'kode_kelas'];

    // Relasi satu ke banyak dengan model Siswa
    public function siswas()
    {
        return $this->hasMany(Siswa::class); // Satu kelas memiliki banyak siswa
    }
    
    // Relasi satu ke banyak dengan model Materi
    public function materis()
    {
        return $this->hasMany(Materi::class); // Satu kelas memiliki banyak materi
    }
}
