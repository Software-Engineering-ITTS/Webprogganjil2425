<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public function up(): void
    // {
    //     Schema::table('mahasiswas', function (Blueprint $table) {
    //         $table->unsignedBigInteger('id_fakultas');

    //         // Add foreign key constraint
    //         $table->foreign('id_fakultas')->references('id')->on('fakultas')->onDelete('cascade');
    //     });
    // }

    // public function down(): void
    // {
    //     Schema::table('mahasiswas', function (Blueprint $table) {
    //         $table->dropForeign(['id_fakultas']);
    //         $table->dropColumn('id_fakultas');
    //     });
    // }

    public function up(): void
    {
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fakultas');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};

?>
