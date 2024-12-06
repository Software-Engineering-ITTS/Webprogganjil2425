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
        Schema::create('bukus', function (Blueprint $table){
            $table->id();
            $table->string('judul');
            $table->text('cover')->nullable();
            $table->string('pengarang');
            $table->string('kategori');
            $table->integer('stock');
            $table->bigInteger('harga');
            $table->timestamps();
            // $table->softDeletes($column = 'deleted_at', $precision = 0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
