<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_cover_image_to_books_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverImageToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('cover_image')->nullable();  // Menambahkan kolom cover_image
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
}

