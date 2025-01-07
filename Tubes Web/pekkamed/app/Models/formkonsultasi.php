<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formkonsultasi extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nama', 'alamat', 'tempat_kelahiran', 'gender', 'umur', 'keluhan','kondisi', 'konsultasi', 'schedule_id', 'antrian',
    // ];

    public function schedule(){
        return $this->belongsTo(schedule::class,  'schedule_id');
    }
}
