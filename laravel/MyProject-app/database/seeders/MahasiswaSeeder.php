<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            // 'NIM' => '1201230007',
            // 'NAMA' => 'Terrafel',
            // 'PRODI' => 'SE',
            // 'ALAMAT' => 'Gunawangsa Merr',
        ]);

        Mahasiswa::factory(15)->create();
    }
}
