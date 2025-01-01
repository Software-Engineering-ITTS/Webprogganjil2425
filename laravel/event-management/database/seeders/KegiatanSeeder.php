<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        Kegiatan::create(['name' => 'Workshop Laravel', 'description' => 'Pelatihan Laravel tingkat dasar.']);
        Kegiatan::create(['name' => 'Seminar IoT', 'description' => 'Seminar tentang pengembangan IoT.']);
        Kegiatan::create(['name' => 'Hackathon 2024', 'description' => 'Kompetisi coding tingkat nasional.']);
    }
}
