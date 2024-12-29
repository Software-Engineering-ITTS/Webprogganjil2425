<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class presensi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'jam_masuk', 'jam_keluar'];

    /**
     * Get the user that owns the presensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id');

    }

}