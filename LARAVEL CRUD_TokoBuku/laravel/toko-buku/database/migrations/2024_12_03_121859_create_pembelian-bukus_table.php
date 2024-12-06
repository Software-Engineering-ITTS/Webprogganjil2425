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
        Schema::create('pembelian_bukus', function (Blueprint $table) {
            $table->id('ID_pembeli');
            $table->string('nama_pembeli');
            $table->date('tanggal_membeli');
            $table->integer('jumlah_buku_yang_dibeli');
            $table->string('nama_buku_yang_dibeli'); // Tipe string
            $table->timestamps();
    
            // Menambahkan kolom foreign key
            $table->unsignedBigInteger('ID_buku');
    
            // Mendefinisikan foreign key
            $table->foreign('ID_buku')->references('ID_buku')->on('toko_bukus')->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('pembelian_bukus'); // Nama tabel sesuai fungsi up
    }    
};
