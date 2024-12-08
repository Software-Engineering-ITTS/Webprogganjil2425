<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan penamaan default (plural dari nama model)
    protected $table = 'transaksis';

    // Tentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'buku_id',
        'jumlah_ordr',
        'hrg_satuan',
        'hrg_total',
        'pembeli',
    ];

    // Definisikan relasi ke model Bukus
    public function bukus()
    {
        return $this->belongsTo(Bukus::class, 'buku_id');
    }
}
