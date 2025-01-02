<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['name', 'phone'];

    // Jika menggunakan timestamps, maka kolom created_at dan updated_at otomatis akan dikelola oleh Eloquent
    // public $timestamps = true;
}
