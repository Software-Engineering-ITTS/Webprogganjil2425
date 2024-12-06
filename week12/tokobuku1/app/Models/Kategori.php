<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_genre',
        'deskripsi',
    ];

    // Relasi ke bukus
    public function bukus()
    {
        return $this->hasMany(Buku::class, 'id_kategori');
    }
}
