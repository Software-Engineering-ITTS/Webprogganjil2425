<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;


    protected $fillable = ['nama', 'kode_kelas'];


    public function siswas()
    {
        return $this->hasMany(Siswa::class); // Satu kelas memiliki banyak siswa
    }
    

    public function materis()
    {
        return $this->hasMany(Materi::class); // Satu kelas memiliki banyak materi
    }
}
