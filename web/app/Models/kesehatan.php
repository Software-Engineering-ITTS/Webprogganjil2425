<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kesehatan extends Model
{
    use HasFactory;

    protected $table = 'kesehatans';

    protected $fillable = [
        'id_pegawai','BeratBadan','TinggiBadan','TekananDarah','SuhuBadan','keluhan',
    ];
}
