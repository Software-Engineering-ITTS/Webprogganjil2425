<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'no_telp', 'kelas_id', 'materi_id','jam_pembelajaran', 'tanggal_pembelajaran']; 

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id'); // Siswa ini termasuk dalam satu Kelas
    }


    public function materi()
    {
        return $this->belongsTo(Materi::class); // Siswa ini memiliki satu Materi
    }
}
    