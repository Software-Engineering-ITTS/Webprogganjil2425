<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Method untuk membuat tabel `materis`
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('judul'); // Kolom untuk judul materi
            $table->text('deskripsi')->nullable(); // Kolom deskripsi yang bersifat opsional
            $table->foreignId('kelas_id') // Kolom untuk relasi ke tabel `kelas`
                ->constrained('kelas')  // Relasi ke tabel `kelas`
                ->onDelete('cascade'); // Hapus materi jika kelas terkait dihapus
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }
    
    // Method untuk menghapus tabel `materis`
    public function down(): void
    {
        Schema::dropIfExists('materi'); // Menghapus tabel jika ada
    }
};
