<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Menambahkan kolom `materi_id` ke tabel `siswas`
     */
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            // Menambahkan kolom `materi_id` sebagai foreign key
            $table->foreignId('materi_id')
                ->nullable()
                ->constrained('materis') // Relasi ke tabel `materis`
                ->onDelete('cascade'); // Hapus data terkait jika materi dihapus
        });
    }

    /**
     * Menghapus kolom `materi_id` dari tabel `siswas`
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['materi_id']); // Menghapus constraint foreign key
            $table->dropColumn('materi_id'); // Menghapus kolom `materi_id`
        });
    }
};
