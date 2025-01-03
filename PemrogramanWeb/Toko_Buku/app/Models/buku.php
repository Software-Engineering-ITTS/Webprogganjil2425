<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class buku extends Model
{
    use HasFactory;
    protected $table = "bukus";

    protected $fillable = [
        "judul", "kategori", "pengarang", "cover"
    ];
    
    protected $guarded = ["id"];
}
