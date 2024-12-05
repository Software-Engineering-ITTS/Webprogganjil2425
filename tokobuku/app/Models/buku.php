<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'harga',
        'stok',
        'foto',
        'id_categories',
        'id_authors',
    ];
}
