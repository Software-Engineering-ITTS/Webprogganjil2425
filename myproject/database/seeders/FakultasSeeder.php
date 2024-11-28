<?php

namespace Database\Seeders;

use App\Models\fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        fakultas::create([
            'nama_fakultas' => 'FIF',
            'deskripsi' => 'Fakultas Informatika'
        ]);
        fakultas::create([
            'nama_fakultas' => 'FTE',
            'deskripsi' => 'Fakultas Teknik Elektro'
        ]);
        fakultas::create([
            'nama_fakultas' => 'FEB',
            'deskripsi' => 'Fakultas Ekonomi dan Bisnis'
        ]);
    }
}
