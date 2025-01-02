<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;


    protected $fillable = ['judul', 'deskripsi', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class); // Materi ini dimiliki oleh satu Kelas
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class); // Satu Materi dapat terkait dengan banyak Siswa
    }
}
