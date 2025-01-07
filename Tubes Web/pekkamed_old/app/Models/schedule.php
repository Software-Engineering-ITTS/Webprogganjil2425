<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\formkonsultasi;

class schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    // protected $primaryKey = 'id';
    // public $incrementing = true; //tujuannya karena id dokter didapatkan secara otomatis
    protected $keyType = 'integer';
    protected $fillable = ['nama', 'hari', 'waktu', 'spesialis'];

    public function pasiens()
    {
        return $this->hasMany(pasien::class);

    }

    public function formkonsultasis(){
        return $this->hasMany(formkonsultasi::class, 'id');
    }
}
