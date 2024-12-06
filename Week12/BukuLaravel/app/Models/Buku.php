<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
        'NAMA',
        'TIPE',
        'cover_buku',
        'PENGARANG',
        'PENERBIT',
        'TAHUN',
    ];

    public function transactions()
    {
    return $this->belongsToMany(Transaction::class);
    }
}
