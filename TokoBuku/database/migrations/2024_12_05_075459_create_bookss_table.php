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
        Schema::create('bookss', function (Blueprint $table) {
            $table->id();
            $table->string('Judul');
            $table->string('Penulis');
            $table->integer('Tahun_terbit');
            $table->integer('Stock');
            $table->bigInteger('Harga');
            $table->text('Cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookss');
    }
};
