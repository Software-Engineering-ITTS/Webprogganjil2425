<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class izin extends Model
{
    use HasFactory;

    protected $table = 'izins';

    protected $fillable = ['user_id', 'jenis_izin', 'tanggal_mulai','tanggal_selesai', 'alasan', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
