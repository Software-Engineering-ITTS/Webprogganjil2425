<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksis';
    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'total_amount'];

    protected $dates = ['deleted_at', 'created_at']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function transactionLists()
    {
        return $this->hasMany(TransaksiList::class);
    }

    public function getTotalAmountFormattedAttribute()
    {
        return number_format($this->total_amount, 0, ',', '.');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    protected $hidden = ['pivot'];
}
