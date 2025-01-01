<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
    }
}

