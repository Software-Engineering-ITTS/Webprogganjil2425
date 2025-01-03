<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'return_date'];

    /**
     * Relasi dengan model Loan (Peminjaman).
     * Satu pengembalian hanya terkait dengan satu peminjaman.
     */
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
