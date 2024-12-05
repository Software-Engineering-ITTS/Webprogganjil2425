<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'books';
    protected $fillable = ['book_title', 'author_name', 'publication_year', 'synopsis', 'price', 'cover_photo'];
}
