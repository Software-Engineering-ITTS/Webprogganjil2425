<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianBukuSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\PembelianBuku::factory(10)->create();
    }
}
