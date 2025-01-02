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
            // $table->foreignId('id_fakultas')->constrained();
            $table->unsignedBigInteger('id_fakultas');
            $table->longText('ktm')->nullable();
            $table->string('nim');
            $table->string('nama');
            $table->string('prodi');
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('id_fakultas')->references('id')->on('fakultas')->onDelete('cascade');

            
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
