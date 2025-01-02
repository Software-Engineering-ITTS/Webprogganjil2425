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
        Schema::create('ambils', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("name");
            $table->string("AMbarang");
            $table->string("JUMbar");
            $table->string("BERbar");
            $table->string("Dateam");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambils');
    }
};
