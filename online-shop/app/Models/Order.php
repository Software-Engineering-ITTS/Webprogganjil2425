<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'quantity',
        'status',
        'customer_name',
        'customer_email',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $product = Product::find($order->product_id);

            if ($product->stock < $order->quantity) {
                throw new \Exception('Stok produk tidak mencukupi.');
            }

            $order->total_price = $product->price * $order->quantity;

            $product->stock -= $order->quantity;
            $product->save();
        });
    }
}
