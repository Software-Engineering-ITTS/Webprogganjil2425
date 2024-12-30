<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengirimans';
    protected $fillable = ['barang_id', 'alamat_tujuan', 'kurir', 'tanggal_pengiriman', 'status'];
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
