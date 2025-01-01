<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data Admin
        User::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // Ganti dengan password yang diinginkan
            'role' => 'admin',
        ]);

        // Tambahkan data User
        User::create([
            'name' => 'User Name',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'), // Ganti dengan password yang diinginkan
            'role' => 'user',
        ]);
    }
}
