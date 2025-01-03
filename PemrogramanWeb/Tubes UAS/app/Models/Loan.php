<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'borrower_name', 'borrow_date', 'due_date'];

    /**
     * Relasi dengan model Book (Buku).
     * Satu peminjaman hanya terkait dengan satu buku.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relasi dengan model Return (Pengembalian).
     * Satu peminjaman hanya bisa memiliki satu pengembalian.
     */
    public function returnRecord()
    {
        return $this->hasOne(ReturnModel::class);
    }
}
