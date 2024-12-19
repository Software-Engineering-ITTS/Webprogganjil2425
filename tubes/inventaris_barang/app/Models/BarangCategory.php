<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang_categories';
    protected $guarded = ['id'];
    public function barangs()
    {
        return $this->belongsToMany(Barang::class);
    }

     protected $fillable = [
        'nama_kategori',
    ];
  
    protected $dates = ['deleted_at'];

  
    public function getProductCount()
    {
        return $this->barangs()->count();
    }


    public function scopeWithActiveProducts($query)
    {
        return $query->whereHas('barangs', function ($query) {
            $query->whereNull('deleted_at'); 
        });
    }
}
