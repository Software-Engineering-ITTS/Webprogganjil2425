<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    /**
     * Relationship: A customer can have many bills.
     */
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
