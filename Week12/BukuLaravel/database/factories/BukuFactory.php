<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    protected $model = \App\Models\Buku::class;

    public function definition()
    {
        return [
            'NAMA' => $this->faker->sentence(3),
            'TIPE' => $this->faker->sentence(3),
            'PENGARANG' => $this->faker->sentence(3),
            'PENERBIT' => $this->faker->sentence(3),
            'TAHUN' => $this->faker->year(),
        ];
    }
}

