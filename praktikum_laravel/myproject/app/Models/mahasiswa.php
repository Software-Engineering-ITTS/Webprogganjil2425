<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'NIM', 'NAMA', "PRODI", "ALAMAT"
    ];

    protected $guarded = ['id'];
    
}
