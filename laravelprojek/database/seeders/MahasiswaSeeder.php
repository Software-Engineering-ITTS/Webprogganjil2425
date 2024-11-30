<?php

namespace Database\Seeders;

use App\Models\mahasiswa;
use Database\Factories\MahasiswaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::created([
            'NIM' => '1201230038',
            'NAMA' => 'Rifqi Reissal Arasy',
            'PRODI' => 'Software Engineering',
            'ALAMAT' => 'Ngagel',
    ]);
        
        // Mahasiswa::Factory(15)->create();
    }
}
