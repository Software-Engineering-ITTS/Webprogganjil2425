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
        Schema::create('orders_details', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_book');
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            // Tambahkan relasi foreign key
            $table->foreign('id_order')->references('order_id')->on('orders')->onDelete('cascade');

            // Tambahkan relasi foreign key
            $table->foreign('id_book')->references('book_id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_details');
    }
};
