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
        // mahasiswa::create([
        //     'nim' => '1201230018',
        //     'nama' => 'Ahmad Ivan Sahmura SOni',
        //     'prodi' => 'SE',
        //     'alamat' => 'Tuban, jawa timur',
        // ]);

        Mahasiswa::factory(10)->create();
    }
}
