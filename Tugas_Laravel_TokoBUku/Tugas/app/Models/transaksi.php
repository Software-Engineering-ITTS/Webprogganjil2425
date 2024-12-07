<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'book_id',
        'pembeli',
        'quantity',
        'total_price',
    ];

    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
