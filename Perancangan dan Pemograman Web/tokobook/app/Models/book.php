<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'stock',
        'cover_image'
    ];
}
