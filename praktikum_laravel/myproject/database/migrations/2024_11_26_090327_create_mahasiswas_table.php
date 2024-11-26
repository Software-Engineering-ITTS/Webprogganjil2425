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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('NIM');
            $table->string('NAMA');
            $table->string('PRODI');
            $table->text('ALAMAT');
            $table->text('fotoktm')->nullable();
            $table->unsignedBigInteger('id_fakultas');
            $table->foreign('id_fakultas')->references('id')->on('fakultas')->onDelete('cascade');
            // $table->foreignId('id_fakultas')->index()->constrained()
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
