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
    Schema::create('returns', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('loan_id');
        $table->date('return_date');
        $table->timestamps();

        $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
    });
}


};
