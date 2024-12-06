<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');         // Kolom untuk judul buku
        $table->string('author');        // Kolom untuk penulis buku
        $table->text('description');     // Kolom untuk deskripsi buku
        $table->integer('stock')->default(0); // Kolom untuk stok buku, default 0
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('books');
    }
}
