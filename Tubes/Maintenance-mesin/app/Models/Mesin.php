<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;
    protected $primaryKey = 'mesin_id';

    protected $table = 'mesin';
    protected $fillable = ['nama_mesin'];

    public function jadwals()
{
    return $this->hasMany(Jadwal::class, 'mesin_id');
}

}
