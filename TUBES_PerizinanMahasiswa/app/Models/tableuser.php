<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class tableuser extends Model
{
    use HasFactory;

    protected $table = 'tableusers';

    protected $fillable = [
            'username',
            'password',
            'level',
    ];
    

    protected $guarded = ['idUser'];

    public function getRouteKeyName()
    {
        return 'username';
    }
}
