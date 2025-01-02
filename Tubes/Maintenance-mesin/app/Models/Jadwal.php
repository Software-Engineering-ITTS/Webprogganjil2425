<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected $fillable = [
        'mesin_id',
        'maintenance_date',
        'status',
    ];

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'mesin_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function maintenances()
    // {
    //     return $this->hasMany(Maintenance::class);
    // }
}
