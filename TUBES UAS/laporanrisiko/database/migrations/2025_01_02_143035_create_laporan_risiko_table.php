<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanRisikoTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_risiko', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('jabatan')->nullable();
            $table->string('kontak')->nullable();
            $table->string('judul_risiko');
            $table->string('kategori_risiko');
            $table->date('tanggal_identifikasi');
            $table->string('lokasi_risiko')->nullable();
            $table->text('deskripsi_risiko')->nullable();
            $table->string('kemungkinan');
            $table->string('dampak');
            $table->unsignedBigInteger('user_id')->nullable(); // Mengaitkan ke user
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_risiko');
    }
}
