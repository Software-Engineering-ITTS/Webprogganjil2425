<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = ['nama','foto', 'stok', 'harga'];

    
    public function pengiriman(): HasMany
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function status(): HasMany
    {
        return $this->hasMany(StatusBarang::class);
    }
}
