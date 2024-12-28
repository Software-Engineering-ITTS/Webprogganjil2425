<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    protected $table = "aircraft";
    protected $fillable = [
        'name',
        'type',
        'nationalorigin',
        'manufactured',
        'price',
        'photo',
    ];
}
