<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Nama tabel dalam database
    protected $table = 'bukus';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'judul_buku',
        'penulis',
        'harga',
        'stok'
    ];
}
