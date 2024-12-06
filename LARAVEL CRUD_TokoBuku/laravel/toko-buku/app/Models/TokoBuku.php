<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBuku extends Model
{
    use HasFactory;

    protected $table = 'toko-bukus';
    protected $primaryKey = 'ID_buku';
    protected $fillable = [
        'nama_buku',
        'status_buku',
        'kuantitas_buku',
        'tanggal_terbit_buku',
        'file_gambar',
        'harga_buku',
    ];

}
