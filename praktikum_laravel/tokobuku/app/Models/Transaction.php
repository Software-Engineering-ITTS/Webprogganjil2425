<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';
    protected $guarded = ['id'];
    
    protected $fillable = ['user_id', 'total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function transactionLists()
    {
        return $this->hasMany(TransactionList::class);
    }
}
