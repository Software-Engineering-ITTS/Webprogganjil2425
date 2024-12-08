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
         Schema::create('transaksis', function (Blueprint $table) {
             $table->id();
             $table->foreignId('buku_id')->constrained('bukuses')->onDelete('cascade'); // memastikan foreign key benar
             $table->integer('jumlah_ordr');
             $table->integer('hrg_satuan');
             $table->integer('hrg_total');
             $table->string('pembeli');
             $table->timestamps();
         });
     }
     
   
     // public function up(): void
    // {
    //     Schema::create('transaksis', function (Blueprint $table) {
    //         $table->id();
    //         $table->integer('hrg_total');
    //         $table->string('pembeli');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
