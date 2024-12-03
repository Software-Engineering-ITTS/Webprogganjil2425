<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'NIM', 'NAMA', "PRODI", "ALAMAT", 'id_fakultas', "fotoktm"
    ];

    protected $guarded = ['id'];
}
