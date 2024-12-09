<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookss>
 */
class BookssFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Judul' => $this->fake->sentence(3), 
            'Penulis' => $this->fake->name(), 
            'Tahun_terbit' => $this->fake->year(), 
            'Stock' => $this->fake->numberBetween(1, 100), 
            'Harga' => $this->fake->numberBetween(50000, 500000), 
            'Cover' => $this->fake->imageUrl(400, 600, 'books', true, 'cover'),
        ];
    }
}
