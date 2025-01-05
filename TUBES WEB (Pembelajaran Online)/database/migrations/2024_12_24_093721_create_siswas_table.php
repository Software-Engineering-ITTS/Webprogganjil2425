<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel `siswas`
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama'); 
            $table->string('email')->unique();
            $table->string('no_telp')->nullable(); 
            $table->foreignId('kelas_id') // Kolom relasi ke tabel `kelas`
                ->constrained('kelas') // Relasi ke tabel `kelas`
                ->onDelete('cascade'); // Hapus siswa jika kelas terkait dihapus
            $table->timestamps(); 
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel `siswas`
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas'); // Menghapus tabel jika ada
    }
};
