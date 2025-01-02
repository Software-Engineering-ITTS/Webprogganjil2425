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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('nama'); // Kolom untuk nama siswa
            $table->string('email')->unique(); // Kolom email siswa dengan constraint unik
            $table->string('no_telp')->nullable(); // Kolom nomor telepon bersifat opsional
            $table->foreignId('kelas_id') // Kolom relasi ke tabel `kelas`
                ->constrained('kelas') // Relasi ke tabel `kelas`
                ->onDelete('cascade'); // Hapus siswa jika kelas terkait dihapus
            $table->timestamps(); // Kolom created_at dan updated_at
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
