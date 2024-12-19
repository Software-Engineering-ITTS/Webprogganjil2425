<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        User::create(
            [
                'username' => 'zaza',
                'name' => 'Elza',
                'email' => 'elza@gmail.com',
                'password' => 'elzacantik123',
                'role' => 'admin'
            ],
            [
                'username' => 'admin',
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Set your password here
                'role' => 'admin',
            ],
            [
                'username' => 'bebek',
                'name' => 'Bebek Karyawan',
                'email' => 'bebek@gmail.com',
                'password' => bcrypt('bebekgoyeng'), // Set your password here
                'role' => 'karyawan',
            ],
        );
    }
}
