<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Details extends Model
{
    use HasFactory;

    protected $table = 'orders_details';

    protected $fillable = ['order_id', 'book_id', 'quantity', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
