<?php

namespace Database\Seeders;

use App\Models\jadwal_kerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Membuat 50 data jadwal kerja
        for ($i = 0; $i < 10; $i++) {
            DB::table('jadwal_kerjas')->insert([
                'tanggal' => $faker->date(), // Menggunakan Faker untuk menghasilkan tanggal acak
                'shift' => $faker->randomElement(['Pagi (07:00 - 15:00)', 'Malam (15:00 - 23:00)']), // Pilih secara acak antara 'Pagi' atau 'Malam'
                'id_karyawan' => $faker->numberBetween(1, 2), // ID Karyawan acak antara 1 dan 4
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 0; $i < 15; $i++) {
            DB::table('jadwal_kerjas')->insert([
                'tanggal' => $faker->date(), // Menggunakan Faker untuk menghasilkan tanggal acak
                'shift' => $faker->randomElement(['Pagi (07:00 - 15:00)', 'Malam (15:00 - 23:00)']), // Pilih secara acak antara 'Pagi' atau 'Malam'
                'id_karyawan' => $faker->numberBetween(4, 6), // ID Karyawan acak antara 1 dan 4
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
