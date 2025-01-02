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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->enum('status_waktu', ['Terlambat', 'Tepat Waktu', 'Tidak Ada'])->nullable();
            $table->enum('status_hadir', ['Hadir', 'Izin', 'Sakit']);
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_jadwal_kerja');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('karyawans')->onDelete('cascade');
            $table->foreign('id_jadwal_kerja')->references('id')->on('jadwal_kerjas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
