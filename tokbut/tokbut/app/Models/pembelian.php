<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookss extends Model
{
    use HasFactory;

    protected $fillable = [
        'Judul', 
        'Penulis', 
        'Tahun_terbit', 
        'Stock', 
        'Harga', 
        'Cover',
    ];
}