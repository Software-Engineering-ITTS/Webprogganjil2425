<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'total_amount',
        'tax',
        'grand_total',
        'status',
        'notes',
        'invoice_date',
        'due_date'
    ];

    protected $dates = [
        'invoice_date',
        'due_date'
    ];

    // Relasi ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke Invoice Items
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    // Relasi ke Payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
