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
            $table->string('nama'); // Kolom untuk nama kelas
            $table->string('kode_kelas')->unique(); // Kolom kode kelas dengan constraint unik
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    // Method untuk menghapus tabel `kelas`
    public function down()
    {
        Schema::dropIfExists('kelas'); // Menghapus tabel jika ada
    }
}
