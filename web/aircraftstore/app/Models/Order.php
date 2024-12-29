<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['customer_id', 'aircraft_id', 'quantity', 'total_price'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
