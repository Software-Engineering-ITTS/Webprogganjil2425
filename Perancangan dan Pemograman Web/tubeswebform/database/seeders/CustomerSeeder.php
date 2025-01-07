<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah email sudah ada
        if (!Customer::where('email', 'like', 'john%')->exists()) {
            Customer::create([
                'name' => 'John Doe',
                'email' => 'john'.rand(1000,9999).'@example.com',
                'phone' => '08123456789',
                'address' => 'Jl. Contoh No. 123',
                'status' => 'active'
            ]);
        }

        if (!Customer::where('email', 'like', 'jane%')->exists()) {
            Customer::create([
                'name' => 'Jane Doe',
                'email' => 'jane'.rand(1000,9999).'@example.com',
                'phone' => '08987654321',
                'address' => 'Jl. Sample No. 456',
                'status' => 'active'
            ]);
        }
    }
}