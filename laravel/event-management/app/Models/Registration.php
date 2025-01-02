<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'nim',
        'verification_code',
        'proof_photo'
    ];

    
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
