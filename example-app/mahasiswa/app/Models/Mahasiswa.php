<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'image',
        'nim',
        'nama',
        'prodi',
        'alamat',
        'id_fakultas'
    ];

    protected $guarded = [
        'id'
    ];

    /**
     * Relasi ke model Fakultas
     */
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas');
    }
}
