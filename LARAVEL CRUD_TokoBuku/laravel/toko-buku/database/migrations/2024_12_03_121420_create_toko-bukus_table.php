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
        Schema::create('toko-bukus', function (Blueprint $table) {
            $table->id('ID_buku');
            $table->string('nama_buku');
            $table->boolean('status_buku');
            $table->integer('kuantitas_buku');
            $table->date('tanggal_terbit_buku');
            $table->string('file_gambar');
            $table->integer('harga_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko-bukus');
    }
};
