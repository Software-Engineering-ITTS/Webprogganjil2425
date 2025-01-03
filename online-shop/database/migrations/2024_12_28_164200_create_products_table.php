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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk (opsional)
            $table->decimal('price', 10, 2); // Harga produk
            $table->integer('stock')->default(0); // Stok produk, default 0
            $table->string('status')->default('aktif'); // Status produk (aktif/nonaktif)
            $table->string('image')->nullable(); // Path gambar produk (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Menghapus tabel products
    }
};
