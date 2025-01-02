<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date_time',
        'end_date_time',
        'location'
    ];

    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany( User::class, 'event_user');
    }
}
