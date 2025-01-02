<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = ['name', 'email', 'kegiatan_id']; 

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
