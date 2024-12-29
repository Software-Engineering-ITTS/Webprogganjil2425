<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lembur extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'jam_mulai', 'jam_selesai', 'keterangan', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
        
    }
}
