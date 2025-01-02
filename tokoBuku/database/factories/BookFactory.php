<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => Category::factory(),
            'title' => fake()->sentence(2),
            'author' => fake()->name(),
            'tanggal_terbit' => fake()->date(),
            'harga' => fake()->randomNumber(),
            'stok' => fake()->randomElement([1,99])
        ];
    }
}
