<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mahasiswa::create([
        //     'nim' => '1201230008',
        //         'nama' => 'Siti Nur Faizah',
        //         'prodi' => 'Software Engineering',
        //         'alamat' => 'Jalan Jetis Kulon Gang X no 20b',
        // ]);
        Mahasiswa::factory(15)->create();
    }
}
