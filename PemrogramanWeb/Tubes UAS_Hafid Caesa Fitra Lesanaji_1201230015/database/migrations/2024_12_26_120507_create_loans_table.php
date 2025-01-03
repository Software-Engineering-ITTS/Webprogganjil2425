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
    Schema::create('loans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('book_id')->constrained()->onDelete('cascade');
        $table->string('borrower_name');
        $table->date('borrow_date');
        $table->date('due_date');
        $table->timestamps();
    });
}
};
