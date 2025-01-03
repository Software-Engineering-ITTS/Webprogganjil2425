<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kegiatan' => $this->faker->sentence(3),
            'tanggal_kegiatan' => $this->faker->date(),
            'lokasi_kegiatan' => $this->faker->address(),
            'waktu_kegiatan' => $this->faker->time('H:i'),
            'deskripsi' => $this->faker->sentence(7),
        ];
    }
}
