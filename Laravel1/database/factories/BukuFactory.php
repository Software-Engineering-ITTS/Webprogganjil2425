<?php

namespace Database\Factories;

use App\Models\Buku; // Pastikan ini ditambahkan
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    protected $model = Buku::class; // Pastikan ini sesuai

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'judul_buku' => $this->faker->sentence(),
            'penulis' => $this->faker->name(),
            'harga' => $this->faker->randomFloat(2, 10, 100),
            'stok' => $this->faker->numberBetween(1, 100),
        ];
    }
}
