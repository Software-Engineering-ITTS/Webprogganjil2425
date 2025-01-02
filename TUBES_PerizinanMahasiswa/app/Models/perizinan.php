<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class perizinan extends Model
{
    use HasFactory;

    public static function listPerizinan(){
        return DB::table('perizinans')
            ->where(['status'=>'1'])->get()->toArray();
    }

    public static function listPerizinanUseronly(){
        return DB::table('perizinans')
            ->where(['idUser'=>session('idUser')])->get()->toArray();
    }
}
