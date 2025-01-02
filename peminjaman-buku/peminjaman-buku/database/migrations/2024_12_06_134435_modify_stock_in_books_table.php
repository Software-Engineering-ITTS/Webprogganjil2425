<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStockInBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('stock')->nullable()->default(0)->change();  // Menambahkan default 0 dan nullable
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('stock')->nullable(false)->default(null)->change();  // Menghapus nullable dan default
        });
    }
}

