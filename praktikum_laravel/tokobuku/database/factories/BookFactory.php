<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'penulis' => $this->faker->name(),
            'tahun_terbit' => $this->faker->year(),
            'stock' => $this->faker->numberBetween(0, 100),
            'harga' => $this->faker->numberBetween(1000, 100000),
            'cover' => $this->faker->imageUrl(400, 600, 'books', true, 'Faker'), // Optional, for cover images
        ];
    }
}
