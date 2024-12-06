<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembeli',
        'tanggal_membeli',
        'ID_buku',
    ];

    protected $table = 'pembelian-bukus';

    public function buku()
    {
        return $this->belongsTo(TokoBuku::class, 'ID_buku');
    }

}
