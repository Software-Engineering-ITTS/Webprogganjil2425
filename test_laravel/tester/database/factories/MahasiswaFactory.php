<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
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
            'nim' => fake()->sentence(1),
            'nama' => fake()->sentence(3),
            'prodi' => fake()->sentence(2),
            'alamat' => fake()->paragraph(mt_rand(5, 10)),
            //
        ];
    }
}
