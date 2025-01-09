<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanrisiko extends Model
{
    use HasFactory;

    protected $table = 'laporan_risiko';

    protected $fillable = [
        'nama_pelapor',
        'jabatan',
        'kontak',
        'judul_risiko',
        'kategori_risiko',
        'tanggal_identifikasi',
        'lokasi_risiko',
        'deskripsi_risiko',
        'kemungkinan',
        'dampak',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
