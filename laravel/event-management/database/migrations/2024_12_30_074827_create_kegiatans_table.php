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
    Schema::create('kegiatans', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama kegiatan
        $table->text('description')->nullable(); // Deskripsi kegiatan (opsional)
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('kegiatans');
}
};

// php artisan tinker
// >>> App\Models\User::all();
// php artisan tinker
// >>> $user = App\Models\User::find(1); // Ganti dengan ID pengguna
// >>> $user->password = Hash::make('password_baru');
// >>> $user->save();
