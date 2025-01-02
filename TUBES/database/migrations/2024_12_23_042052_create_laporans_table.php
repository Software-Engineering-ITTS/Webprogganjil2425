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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->String("Nama_Barang");
            $table->String("Jumlah_Barang");
            $table->String("Nominal");
            $table->String("Status");
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();
            $table->foreign('id_admin')->references('id')
            ->on('penggunas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
