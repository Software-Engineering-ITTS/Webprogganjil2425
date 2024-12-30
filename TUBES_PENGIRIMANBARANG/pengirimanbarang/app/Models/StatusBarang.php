<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusBarang extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'status'];

    
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
}

