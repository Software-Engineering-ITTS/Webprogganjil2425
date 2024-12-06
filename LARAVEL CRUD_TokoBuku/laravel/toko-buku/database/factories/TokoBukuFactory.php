<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PeminjamanBuku;
use App\Models\TokoBuku;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\toko-buku>
 */
class TokoBukuFactory extends Factory
{
    protected $model = TokoBuku::class;

    public function definition(): array
    {
        return [
            'nama_buku' => fake()->sentence(),
            'status_buku' => fake()->boolean(),
            'jumlah_buku' => fake()->numberBetween(1, 1000),
            'tanggal_terbit_buku' => fake()->date(),
            'file_gambar' => fake()->sentence(),
            'harga_buku' => fake()->numberBetween(10000, 1000000),
        ];
    }
}
