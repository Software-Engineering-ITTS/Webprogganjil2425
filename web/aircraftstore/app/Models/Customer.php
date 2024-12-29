<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['fullname', 'phone_number', 'address', 'city', 'province', 'country', 'postal_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
