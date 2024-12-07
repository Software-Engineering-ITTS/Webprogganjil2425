<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'img',
        'judul',
        'penulis',
        'harga',
        'deskripsi'
    ];

    protected $guarded = ['id'];

    public function transkasi()
    {
        return $this->hasMany(transaksi::class);
    }
}
