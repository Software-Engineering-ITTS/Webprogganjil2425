<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultDescriptionToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('description')->default('Tidak ada deskripsi')->change();
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('description')->default(null)->change();
        });
    }
}

