<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penambahan extends Model
{
    use HasFactory;

    protected $table = 'penambahans';

    protected $fillable = [

    'email','name', 'NamaBar', 'JumlahBar', 'BeratBar', 'DateBar', 'StatusBar',
    ];
}
