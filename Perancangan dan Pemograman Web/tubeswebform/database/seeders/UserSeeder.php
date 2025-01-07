<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua user yang ada (untuk memastikan tidak ada duplikat)
        User::truncate();

        // Buat user admin baru
        User::create([
            'name' => 'Raihan',
            'email' => 'raihan03@gmail.com', // php artisan db:seed --class=UserSeeder
            'password' => Hash::make('12345') 
        ]);
    }
}