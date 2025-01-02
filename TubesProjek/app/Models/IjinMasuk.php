<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IjinMasuk extends Model
{

    protected $fillable = [
        'user_id', 
        'ruangan_id', 
        'alasan', 
        'waktu_ijin', 
        'status_verifikasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
