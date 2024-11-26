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
    //     Mahasiswa::create([
    //         'NIM' => '1231321',
    //         'NAMA' => 'Digidaw',
    //         'PRODI' => 'Software Engineering',
    //         'ALAMAT' => 'Ketintang, Surabaya'
    //     ],
    // );

        Mahasiswa::factory(15)->create();
    }
}
