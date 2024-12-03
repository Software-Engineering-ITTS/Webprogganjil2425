<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionList extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    
    protected $fillable = ['transaction_id', 'book_id', 'quantity', 'total_price'];

    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }


}
