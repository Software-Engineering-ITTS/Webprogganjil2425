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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('tempat_kelahiran');
            $table->enum('gender', ['Laki Laki', 'Perempuan']);
            $table->integer('umur');
            $table->text('keluhan');
            $table->enum('kondisi' , ['Rentang Normal', 'Merasakan Sakit',  'Sakit Berlebihan']);
            $table->boolean('konsultasi')->default(false);
            $table->enum('antrian', ['Normal', 'Slight Emergency', 'Emergency']);
            $table->unsignedBigInteger('iddokter');
            $table->timestamps();

            $table->foreign('iddokter')->references('id')->on('schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
