<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        customer::create([
            'nama' => 'Dita',
            'alamat' => 'Siwalankerto',
            'no_telp' => '089109097845',
            'email' => 'dita',
            'password' => 'dita',
        ]);
        customer::create([
            'nama' => 'Tera',
            'alamat' => 'Gayungan',
            'no_telp' => '089256890808',
            'email' => 'tera',
            'password' => 'tera',
        ]);
    }
}
