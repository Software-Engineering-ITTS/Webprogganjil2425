<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanggulangan extends Model
{
    use HasFactory;

    protected $table = 'penanggulangan';

    protected $fillable = [
        'id_risiko',
        'penanggulangan',
        'penanggung_jawab',
        'status',
        'target_penyelesaian',
        'created_at',
        'updated_at',
    ];

    public function laporanRisiko()
{
    return $this->belongsTo(laporanRisiko::class, 'id_risiko');
}

}
