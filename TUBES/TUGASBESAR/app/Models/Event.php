<?php

// File: app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'event_date', 'start_time', 'end_time', 'location', 'category', 'max_participants', 'price', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    

public function participants()
{
    return $this->hasMany(Registration::class);
}

}

