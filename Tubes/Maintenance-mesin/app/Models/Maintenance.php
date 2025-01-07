<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance';

    protected $fillable = [
        'mesin_id',
        'user_id',
        'jadwal_id',
        'maintenance_date',
        'status',
        'deskripsi_perawatan',
    ];

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'mesin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'jadwal_id');
    }
}
