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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mesin_id')->constrained('Mesin')->onDelete('cascade');
            $table->date('maintenance_date');
            $table->enum('status', ['Pending', 'In Progress', 'Completed']);
            // $table->foreignId('user_id')->nullable()->constrained('users');
            // $table->text('deskripsi_perawatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
