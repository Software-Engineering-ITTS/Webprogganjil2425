<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';
    protected $fillable = [
        'kode_barang',
        'nama_aset',
        'spesifikasi',
        'gambar_aset',
        'kategori_aset',
        'departement',
    ];

    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->hasMany(Lokasi::class, 'aset_id');
    }
}
