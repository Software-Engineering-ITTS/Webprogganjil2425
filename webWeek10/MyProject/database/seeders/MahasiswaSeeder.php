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
        //     'NIM' => '1201230040',
        //     'NAMA' => 'Dita Ramadhani Tianto',
        //     'PRODI' => 'Software Engineering',
        //     'ALAMAT' => 'Ketintang, Surabaya',
        // ]);

        Mahasiswa::factory(10)->create();


    }
}
