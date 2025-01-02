<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'jabatan' => $this->faker->jobTitle(),
            'gaji_pokok' => $this->faker->numberBetween(3000000, 7000000),
            'tunjangan' => $this->faker->numberBetween(500000, 1500000),
        ];
    }
}
