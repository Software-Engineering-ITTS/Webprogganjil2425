<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Mendefinisikan atribut yang dapat diisi secara massal
    protected $fillable = ['nama', 'email', 'no_telp', 'kelas_id', 'materi_id']; // Pastikan materi_id disertakan

    // Relasi satu ke satu (Siswa terkait dengan satu Kelas)
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id'); // Siswa ini termasuk dalam satu Kelas
    }

    // Relasi satu ke satu (Siswa terkait dengan satu Materi)
    public function materi()
    {
        return $this->belongsTo(Materi::class); // Siswa ini memiliki satu Materi
    }
}
    