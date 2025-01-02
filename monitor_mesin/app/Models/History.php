<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = [
        'table',
        'action',
        'attribute',
        'old_value',
        'new_value',
        'changed_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
