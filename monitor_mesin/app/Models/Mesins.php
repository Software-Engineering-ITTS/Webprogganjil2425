<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesins extends Model
{
    use HasFactory;

    protected $table = 'mesins';

    protected $fillable = [
        'nama',
        'deskripsi',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function kondisiMesin()
    {
        return $this->hasOne(Kondisi_Mesins::class, 'mesin_id', 'id');
    }
}
