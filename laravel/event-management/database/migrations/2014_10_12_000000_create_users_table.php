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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->enum('role', ['user', 'admin'])->default('user'); // Default role
        $table->rememberToken();
        $table->timestamps();
    });

    // Masukkan data Admin dan User
    DB::table('users')->insert([
        [
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'User Name',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

public function down()
{
    Schema::dropIfExists('users');
}
};
