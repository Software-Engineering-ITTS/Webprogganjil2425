<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksis';

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_pelanggan',
        'total_transaksi',
        'user_id',
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $hidden = ['pivot'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function transactionLists()
    {
        return $this->hasMany(TransaksiList::class);
    }

    
    public function getTotalTransaksiFormattedAttribute()
    {
        return number_format($this->total_transaksi, 0, ',', '.');
    }

    
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    
    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format('d-m-Y');
    }

    
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    
    public function scopeByDate($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }
}
