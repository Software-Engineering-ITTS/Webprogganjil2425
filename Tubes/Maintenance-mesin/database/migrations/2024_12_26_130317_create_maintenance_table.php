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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mesin_id')->constrained('Mesin')->onDelete('cascade');
            // $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade');
            $table->foreignId('jadwal_id')->references('jadwal_id')->on('jadwal')->onDelete('cascade');
            $table->enum('status', ['Pending', 'In Progress', 'Completed']);
            $table->string('deskripsi_perawatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
        Schema::table('maintenance', function (Blueprint $table) {
            $table->dropForeign(['jadwal_id']);
            $table->dropColumn('jadwal_id');
        });
    }
};
