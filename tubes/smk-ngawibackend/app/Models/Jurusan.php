<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\Support\Str;

class Jurusan extends Model
{
    /** @use HasFactory<\Database\Factories\JurusanFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_jurusan',
        'slug_jurusan',
        'deskripsi_jurusan'
    ];

    public function getRouteKeyName() {
        return 'slug_jurusan' ;
    }

    public function setNamaJurusanAttribute($value){
        $this->attributes['nama_jurusan'] = $value;
        $this->attributes['slug_jurusan'] = Str::slug($value);

    }
    
    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
