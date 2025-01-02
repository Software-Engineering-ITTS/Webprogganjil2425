<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi (fillable) untuk keamanan
    protected $fillable = ['nama', 'kategori', 'harga', 'stok'];

    // Jika Anda menggunakan timestamps di database, pastikan kolom created_at dan updated_at ada
    public $timestamps = true;

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
