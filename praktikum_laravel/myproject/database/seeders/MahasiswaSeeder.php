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
        Mahasiswa::create(
            [
                Mahasiswa::factory(15)->create()
            ]
            // [
            //     'NIM' => "1201230019",
            //     'NAMA' => "Muhammad Asthi Seta Ari Yuwana",
            //     'PRODI' => "Software Engineering",
            //     'ALAMAT' => "Jalanin aja dulu",
            // ],

        );
    }
}
