<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Method untuk membuat tabel `materis`
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('judul'); // Kolom untuk judul materi
            $table->text('deskripsi')->nullable();
            $table->foreignId('kelas_id') 
                ->constrained('kelas')  
                ->onDelete('cascade'); // Hapus materi jika kelas terkait dihapus
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
