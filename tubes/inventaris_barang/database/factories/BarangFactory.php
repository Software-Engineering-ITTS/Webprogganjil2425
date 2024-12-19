<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BarangCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

        return [
            'kode_barang' => strtoupper($this->faker->unique()->lexify('BRG????')), // Example: BRG1234
            'nama_barang' => $this->faker->word, // Example: "Sabun"
            'kategori_id' => BarangCategory::factory(), // Automatically creates a category
            'tanggal_diterima' => $this->faker->date(),
            'tanggal_expired' => $this->faker->optional()->date(),
            'stock' => $this->faker->numberBetween(10, 100),
            'harga' => $this->faker->numberBetween(5000, 50000), // Price in IDR
            'catatan' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
