<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id'); // Referensi ke tabel users
            $table->string('name');               // Nama pemesan
            $table->enum('gender', ['Pria', 'Wanita']); // Jenis kelamin
            $table->string('nationality');        // Kewarganegaraan
            $table->date('dob');                  // Tanggal lahir
            $table->string('phone');              // Nomor telepon
            $table->timestamp('order_date');      // Tanggal pemesanan
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
