<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Database\Factories\FakultasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Fakultas::create([
            'nama_fakultas' => 'FIF',
            'deskripsi' => 'Informatika',
        ]);
    }
}
