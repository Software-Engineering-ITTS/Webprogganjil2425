<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'image', 'status', 'stock'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function isInStock($quantity)
    {
        return $this->stock >= $quantity;
    }

    public function reduceStock($quantity)
    {
        if ($this->isInStock($quantity)) {
            $this->stock -= $quantity;
            $this->save();
            return true;
        }
        return false;
    }
}
