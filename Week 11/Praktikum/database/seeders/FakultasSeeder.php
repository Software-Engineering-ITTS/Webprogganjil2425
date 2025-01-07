<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;


class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fakultas::insert([
            [
                'nama_fakultas' => 'FIF',
                'deskripsi' => 'Fakultas Informatika',
            ],
            [
                'nama_fakultas' => 'FRI',
                'deskripsi' => 'Fakultas Rekayasa Industri',
            ],
            [
                'nama_fakultas' => 'FTE',
                'deskripsi' => 'Fakultas Teknik Elektro',
            ],
            [
                'nama_fakultas' => 'FEB',
                'deskripsi' => 'Fakultas Ekonomi dan Bisnis',
            ],
        ]);
    }
}
