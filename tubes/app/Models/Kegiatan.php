<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
        'lokasi_kegiatan',
        'waktu_kegiatan',
        'deskripsi',
    ];

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'kegiatan_anggotas', 'kegiatan_id', 'user_id')
                    ->withPivot('iuran')
                    ->withTimestamps();
    }
}
