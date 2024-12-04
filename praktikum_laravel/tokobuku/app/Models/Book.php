<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'judul',
        'nama',
        "penulis",
        "tahun_terbit",
        'stock',
        "harga",
        "cover"
    ];

    protected $guarded = ['id'];

    public function transactionLists()
    {
        return $this->hasMany(TransactionList::class);
    }

    protected $dates = ['deleted_at']; 
}
