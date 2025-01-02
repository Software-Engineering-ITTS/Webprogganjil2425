<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\LaporanPenjualan;

class Transaksi extends Model
{
    protected $fillable = ['produk_id', 'jumlah', 'total_harga', 'customer_id', 'phone'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    
    
    protected static function booted()
    {
        static::creating(function ($transaksi) {
            $produk = Produk::find($transaksi->produk_id);

            // Validasi stok mencukupi
            if (!$produk || $produk->stok < $transaksi->jumlah) {
                throw new \Exception("Stok tidak mencukupi untuk produk: {$produk->nama}");
            }

            // Hitung total harga
            $transaksi->total_harga = $produk->harga * $transaksi->jumlah;
        });

        static::created(function ($transaksi) {
            // Kurangi stok produk setelah transaksi dibuat
            $transaksi->produk->decrement('stok', $transaksi->jumlah);
        });

        static::deleted(function ($transaksi) {
            // Kembalikan stok jika transaksi dihapus
            $transaksi->produk->increment('stok', $transaksi->jumlah);
        });

        static::creating(function ($transaksi) {
            $customer = Customer::find($transaksi->customer_id);
            $transaksi->phone = $customer->phone;
        });
 
        static::updating(function ($transaksi) {
            $customer = Customer::find($transaksi->customer_id);
            $transaksi->phone = $customer->phone;
        });
    }
}
