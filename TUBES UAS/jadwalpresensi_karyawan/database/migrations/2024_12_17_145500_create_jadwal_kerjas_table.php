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
        Schema::create('jadwal_kerjas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('shift');
            $table->unsignedBigInteger('id_karyawan');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('karyawans')->onDelete('cascade');
            // $table->foreign('id_karyawan')->references('id')->on('karyawans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kerjas');
    }
};
