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
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id('idPerizinan');
            $table->unsignedBigInteger('idUser');
            $table->string('nama');
            $table->string('nim', 15);
            $table->string('alamat');
            $table->date('tanggal');
            $table->string('tempat');
            $table->text('kegiatan');
            $table->integer('status');
            $table->unsignedBigInteger('idAdmin');
            $table->foreign('idUser')->references('idUser')->on('tableusers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};
