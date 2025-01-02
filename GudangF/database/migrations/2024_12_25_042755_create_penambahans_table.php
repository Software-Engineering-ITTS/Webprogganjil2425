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
        Schema::create('penambahans', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("name");
            $table->string("NamaBar");
            $table->string("JumlahBar");
            $table->string("BeratBar");
            $table->string("DateBar");
            $table->string("StatusBar")->default('di gudang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penambahans');
    }
};
