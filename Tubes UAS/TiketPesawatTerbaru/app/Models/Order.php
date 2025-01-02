<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'name',
        'gender',
        'nationality',
        'dob',
        'phone',
        'order_date',
        'payment_status',
        'check_in_status',
        'payment_date',
        'check_in_date',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}

