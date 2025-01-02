<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    // Method untuk membuat tabel `kelas`
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('nama'); 
            $table->string('kode_kelas')->unique(); // Kolom kode kelas dengan constraint unik
            $table->timestamps(); 
        });
    }

    // Method untuk menghapus tabel `kelas`
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
