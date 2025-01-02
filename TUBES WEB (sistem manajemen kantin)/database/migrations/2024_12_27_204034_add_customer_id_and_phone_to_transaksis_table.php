<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerIdAndPhoneToTransaksisTable extends Migration
{
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Menambahkan kolom customer_id yang terhubung ke tabel customers
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');

            // Menambahkan kolom phone untuk menyimpan nomor telepon customer
            $table->string('phone')->nullable();
        });
    }

    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Menghapus kolom customer_id dan phone
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
            $table->dropColumn('phone');
        });
    }
}
