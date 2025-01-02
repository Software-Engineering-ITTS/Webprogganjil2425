<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    protected $fillable = [
        'nama_kegiatan', 
        'penanggung_jawab', 
        'waktu_mulai', 
        'waktu_selesai', 
        'ruangan_id', 
        'aktivitas_mencurigakan',
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
