<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    use HasFactory;

    protected $table = 'tokos';

    protected $fillable = [
        'Judul','Penulis','Harga','img'
    ];

    protected $guarded = ['id'];

    public function transkasi()
    {
        return $this->hasMany(transaksi::class);
    }
}
