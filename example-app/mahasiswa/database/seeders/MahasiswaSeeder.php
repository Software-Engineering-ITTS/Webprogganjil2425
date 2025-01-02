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
            'nim' => '1201230024',
            'nama' => 'Muhammad Dliyaaul',
            'prodi' => 'RPL',
            'alamat' => 'Jojoran 3A, Surabaya',
            'id_fakultas' => 1
        ]);
    }
}
