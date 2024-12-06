<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokbuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'tanggal',
        'cover',
        'stock',
    ];
}
