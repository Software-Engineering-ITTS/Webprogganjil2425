<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'tanggal_lahir' => '2000,01,01',
            'gender' => 'Laki - Laki',
            'email' => 'admin@example.com',
            'telepon' => '+62 88865642500',
            'password' => Hash::make('admin123'),
            'image' => 'images/default.png',
            'role' => 'admin',
        ]);
    }
}
