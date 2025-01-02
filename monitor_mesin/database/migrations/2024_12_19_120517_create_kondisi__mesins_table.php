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
        Schema::create('kondisi__mesins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mesin_id');
            $table->string('status');
            $table->float('temperature');
            $table->datetime('last_checked');
            $table->text('notes');
            $table->timestamps();

            // Tambahkan relasi foreign key
            $table->foreign('mesin_id')->references('id')->on('mesins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi__mesins');
    }
};
