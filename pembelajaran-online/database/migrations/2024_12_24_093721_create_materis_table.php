<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->foreignId('kelas_id')
                ->constrained('kelas')  
                ->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
