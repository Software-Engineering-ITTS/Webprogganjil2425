<?php

namespace Database\Seeders;

use App\Models\Presensi;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;
class PresensiSeeder extends Seeder
{
    public function run()
    {
        $karyawans = Karyawan::all();

        foreach ($karyawans as $karyawan) {
            Presensi::factory()->count(10)->create([
                'karyawan_id' => $karyawan->id,
            ]);
        }
    }
}
