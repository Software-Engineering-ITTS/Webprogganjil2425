<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan beberapa data dummy ke dalam tabel jadwal
        Jadwal::create([
            'mesin_id' => 1, // ID mesin yang ada di tabel mesin
            'maintenance_date' => '2024-12-31',
            'status' => 'Pending',
        ]);

        Jadwal::create([
            'mesin_id' => 2,
            'maintenance_date' => '2024-12-30',
            'status' => 'In Progress',
        ]);
    }
}
