<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mahasiswa::create([
        //     'NIM' => '1201230028',
        //     'NAMA' => 'Dimas Iqbal Rizqulloh',
        //     'PRODI' => 'Software Engineering',
        //     'ALAMAT' => 'Ponorogo, Jawa Timur',
        // ]);

        Mahasiswa::factory(15)->create();
    }
}
