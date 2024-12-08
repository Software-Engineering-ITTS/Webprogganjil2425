<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'nama',
        'telepon', 
        'alamat', 
        'status',
        'toko_id'
    ];

    protected $guarded = ['id'];
    public function toko()
    {
        return $this->belongsTo(toko::class);
    }
}