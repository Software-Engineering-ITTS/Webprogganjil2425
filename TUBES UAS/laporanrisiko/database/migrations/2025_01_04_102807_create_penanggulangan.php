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
        Schema::create('penanggulangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_risiko');
            $table->text('penanggulangan');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_risiko')->references('id')->on('laporan_risiko')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanggulangan');
    }
};
