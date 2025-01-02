<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback'; // Nama tabel di database
    protected $fillable = [
        'name',
        'email',
        'rating',
        'comment',
        'image'
        ]; // Kolom yang dapat diisi
}
