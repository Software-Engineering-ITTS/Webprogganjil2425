<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_image', 'author', 'isbn', 'quantity'];

    /**
     * Relasi dengan model Loan (Peminjaman).
     * Satu buku dapat dipinjam beberapa kali.
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
