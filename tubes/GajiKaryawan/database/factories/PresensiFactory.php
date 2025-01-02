<?php

namespace Database\Factories;

use App\Models\Presensi;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\presensi>
 */
class PresensiFactory extends Factory
{
    public function definition()
    {
        return [
            'karyawan_id' => Karyawan::factory(),
            'tanggal' => $this->faker->dateTimeThisMonth(),
            'status' => $this->faker->randomElement(['Hadir', 'Alpha', 'Sakit']),
        ];
    }
}

