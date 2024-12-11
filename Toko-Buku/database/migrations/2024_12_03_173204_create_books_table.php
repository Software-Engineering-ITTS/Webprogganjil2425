<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string('image');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->unsignedBigInteger('id_category');
            $table->timestamps();

            // Tambahkan relasi foreign key
            $table->foreign('id_category')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
