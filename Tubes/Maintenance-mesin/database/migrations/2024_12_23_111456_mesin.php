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
        Schema::create('Mesin', function (Blueprint $table) {
            $table->mesin_id();
            $table->string('no_mesin');
            $table->string('nama_mesin');
            $table->string('sparepart_mesin');
            // $table->string('sparepart_mesin')->after('nama_mesin')->nullable();
            $table->string('fungsi_mesin');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mesin', function (Blueprint $table) {
            $table->dropColumn('sparepart_mesin'); // Hapus kolom baru saat rollback
        });
    }
};
