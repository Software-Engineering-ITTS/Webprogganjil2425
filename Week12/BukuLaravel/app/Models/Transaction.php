<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'buku_id',
        'transaction_date',
        'status',
    ];

    public function bukus()
    {
    return $this->belongsTo(Buku::class);
    }
}
