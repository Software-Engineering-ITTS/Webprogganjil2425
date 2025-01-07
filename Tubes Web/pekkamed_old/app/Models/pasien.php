<?php

namespace App\Models;

use App\Models\schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = ['nama', 'alamat', 'tempat_kelahiran', 'gender', 'umur', 'keluhan', 'kondisi', 'konsultasi', 'antrian', 'schedule_id'];

    //relasi dengan model schedule
    public function schedule(){
        return $this->belongsTo(schedule::class,  'schedule_id');
    }
}
