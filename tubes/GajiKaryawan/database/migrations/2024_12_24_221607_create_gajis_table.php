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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained()->onDelete('cascade');
            $table->integer('total_hadir')->default(0);
            $table->integer('total_alpha')->default(0); 
            $table->decimal('gaji_pokok', 12, 2); 
            $table->decimal('potongan', 12, 2)->default(0);
            $table->decimal('tunjangan', 12, 2)->default(0); 
            $table->decimal('bonus', 12, 2)->default(0); 
            $table->decimal('gaji_bersih', 12, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
