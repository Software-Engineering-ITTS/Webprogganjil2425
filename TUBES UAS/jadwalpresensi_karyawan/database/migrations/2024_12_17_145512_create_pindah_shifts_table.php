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
        Schema::create('pindah_shifts', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_awal');
            $table->string('shift_awal');
            $table->date('tanggal_pindah');
            $table->string('shift_pindah');
            $table->text('alasan');
            $table->enum('status_pengajuan', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending')->nullable();
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_proses')->nullable();
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
        Schema::dropIfExists('pindah_shifts');
    }
};
