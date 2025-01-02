<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi_Mesins extends Model
{
    use HasFactory;

    protected $table = 'kondisi__mesins';

    protected $fillable = [
        'mesin_id',
        'temperature',
        'status',
        'last_checked',
        'notes'
    ];

    public function mesin()
    {
        return $this->belongsTo(Mesins::class, 'mesin_id', 'id');
    }

    protected $casts = [
        'last_checked' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kondisi_mesin) {
            if ($kondisi_mesin->temperature >= 30 && $kondisi_mesin->temperature <= 50 && !$kondisi_mesin->last_checked) {
                $kondisi_mesin->status = 'Normal';
                $kondisi_mesin->last_checked = now();
            } else if ($kondisi_mesin->temperature > 50 && $kondisi_mesin->temperature <= 80 && !$kondisi_mesin->last_checked) {
                $kondisi_mesin->status = 'Overheat';
                $kondisi_mesin->last_checked = now();
            } else {
                $kondisi_mesin->status = '';
            }
        });
    }
}
