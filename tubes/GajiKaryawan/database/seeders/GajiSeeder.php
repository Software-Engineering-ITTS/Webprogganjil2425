<?php

namespace Database\Seeders;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    public function run()
    {
        $karyawans = Karyawan::all();

        foreach ($karyawans as $karyawan) {
            $totalHadir = rand(20, 26); // Contoh perhitungan hadir
            $potongan = (26 - $totalHadir) * 50000;
            $gajiBersih = ($karyawan->gaji_pokok + $karyawan->tunjangan) - $potongan;

            Gaji::create([
                'karyawan_id' => $karyawan->id,
                'total_hadir' => $totalHadir,
                'potongan' => $potongan,
                'gaji_bersih' => $gajiBersih,
            ]);
        }
    }
}
