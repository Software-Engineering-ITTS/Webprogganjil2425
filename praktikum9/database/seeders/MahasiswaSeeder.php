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
    //    Mahasiswa::created([
    //     'NIM' => "123",
    //     'NAMA' => "Alvian",
    //     'PRODI' => "RPL",
    //     'ALAMAT' => "Surabaya",
    //    ]);

         Mahasiswa::factory(3)->create();
    }
}
