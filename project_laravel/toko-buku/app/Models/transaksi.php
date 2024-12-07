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
        'books_id'
    ];

    protected $guarded = ['id'];
    public function book()
    {
        return $this->belongsTo(book::class);
    }
}
