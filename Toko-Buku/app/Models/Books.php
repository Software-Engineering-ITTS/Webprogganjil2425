<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Orders_Details;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'book_id';
    public $incrementing = true; // True jika auto-increment
    protected $keyType = 'int';

    protected $fillable = ['image', 'title', 'author', 'publisher', 'price', 'stock', 'id_category'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(Orders_Details::class, 'book_id');
    }
}
