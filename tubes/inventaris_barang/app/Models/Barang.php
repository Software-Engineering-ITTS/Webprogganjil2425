<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_id',
        'tanggal_diterima',
        'tanggal_expired',
        'stock',
        'harga',
        'catatan',
    ];

    protected $dates = ['tanggal_expired', 'deleted_at']; // Soft delete column and expired date


    protected $guarded = ['id'];

    public function transactionLists()
    {
        return $this->hasMany(TransaksiList::class);
    }


    public function kategori()
    {
        return $this->belongsTo(BarangCategory::class, 'kategori_id');
    }


    public function stockStatus()
    {
        if ($this->stock <= 0) {
            return 'Out of Stock';
        }
        return 'In Stock';
    }


    public function getExpiredFormatted()
    {
        return $this->tanggal_expired ? $this->tanggal_expired->format('d-m-Y') : '-';
    }

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    public function scopeExpired($query)
    {
        return $query->where('tanggal_expired', '<', now());
    }
}
