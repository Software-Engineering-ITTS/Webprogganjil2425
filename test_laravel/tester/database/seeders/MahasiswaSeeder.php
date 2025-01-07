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
        mahasiswa::create([
            'nim' => '1201240011',
            'nama' => 'Wafi Fathan',
            'prodi' => 'Informatika',
            'id_fakultas' => 1,
            'alamat' => 'Jakarta Utara',
            'foto' => ''
        ]);

        mahasiswa::create([
            'nim' => '1201240021',
            'nama' => 'Gusti Rifan',
            'prodi' => 'Informatika',
            'id_fakultas' => 1,
            'alamat' => 'Kalimantan Timur',
            'foto' => ''
        ]);
        // 
        Mahasiswa::factory(15)->create();
        // set berapa data di dalam factory
    }
}
