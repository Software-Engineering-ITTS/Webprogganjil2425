<?php

namespace Database\Seeders;

use App\Models\mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // mahasiswa::create([
        //     'NIM' => '1201230043',
        //     'NAMA' => 'Muhammad Khafidh Ainur Rasyidh',
        //     'PRODI' => 'Software Engineering',
        //     'ALAMAT' => 'Kedungmaling, Sooko, Mojokerto',
        // ]

        Mahasiswa::factory(15)->create();
    // );
    }
}
