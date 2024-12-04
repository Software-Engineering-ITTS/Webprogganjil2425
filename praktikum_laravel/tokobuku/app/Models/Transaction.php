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

    protected $dates = ['deleted_at']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function transactionLists()
    {
        return $this->hasMany(TransactionList::class);
    }

    public function getTotalAmountFormattedAttribute()
    {
        return number_format($this->total_amount, 0, ',', '.');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }
}
