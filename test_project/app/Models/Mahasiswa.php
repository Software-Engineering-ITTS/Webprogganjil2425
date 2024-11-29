<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    use HasFactory;


    protected $table = 'mahasiswas';
    protected $fillable =[
        'ktm',
        'nim',
        'nama',
        'prodi',
        'alamat',
        'id_fakultas'
    ];

    protected $guarded = ['id'];

    // public function fakultas():BelongsTo{
    //     return $this->belongsTo(Fakultas::class);
    // }
    
}

