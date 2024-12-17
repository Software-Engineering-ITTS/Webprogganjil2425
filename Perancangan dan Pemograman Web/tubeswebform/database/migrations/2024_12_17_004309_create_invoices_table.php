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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2);
            $table->enum('status', ['unpaid', 'paid', 'cancelled'])->default('unpaid');
            $table->text('notes')->nullable();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
