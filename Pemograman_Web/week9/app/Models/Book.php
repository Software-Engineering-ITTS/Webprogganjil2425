<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'price', 'stock', 'cover_image'];


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
