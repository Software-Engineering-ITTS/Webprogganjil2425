<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NIM' =>  fake()->sentence(1),
            'NAMA' =>  fake()->sentence(3),
            'PRODI' =>  fake()->sentence(2),
            'ALAMAT' =>  fake()->paragraph(mt_rand (5,10)),
        ];
    }
}
