<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ambil extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',      
        'AMbarang',   
        'JUMbar',     
        'BERbar',     
        'Dateam',    
    ];
}
