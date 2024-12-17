<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_id',
        'amount',
        'payment_method',
        'payment_reference',
        'status',
        'payment_date',
        'notes'
    ];

    protected $dates = [
        'payment_date'
    ];

    // Relasi ke Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
