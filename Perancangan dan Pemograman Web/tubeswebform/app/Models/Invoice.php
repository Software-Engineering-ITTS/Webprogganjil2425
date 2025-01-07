<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'invoice_date',
        'due_date',
        'total_amount',
        'tax',
        'grand_total',
        'status',
        'notes'
    ];

    protected $casts = [
        'invoice_date' => 'datetime',
        'due_date' => 'datetime'
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
