<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiList extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaksi_lists';

    protected $guarded = ['id'];

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'quantity',
        'subtotal'
    ];


    protected $dates = ['deleted_at']; 


    public function transaction()
    {
        return $this->belongsTo(Transaksi::class);
    }


    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    protected $hidden = ['pivot'];
}
