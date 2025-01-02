<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama_Barang',
        'Jumlah_Barang',
        'Nominal',
        'Status',
        'id_admin',
    ];
}
