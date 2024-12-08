<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukus extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'penulis',
        'stok',
        'harga',
    ];

    /**
     * Relasi ke tabel transaksis (One-to-Many)
     */
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'buku_id');
    }
}




