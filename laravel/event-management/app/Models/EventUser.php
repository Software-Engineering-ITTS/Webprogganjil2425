<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{

    protected $table = 'event_user';
    protected $fillable = [
        'event_id',
        'user_id'
    ];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
