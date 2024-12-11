<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';
    public $incrementing = true; // True jika auto-increment
    protected $keyType = 'int';


    protected $fillable = ['name', 'description'];

    public function books()
    {
        return $this->hasMany(Books::class, 'id_category', 'category_id');
    }
}
