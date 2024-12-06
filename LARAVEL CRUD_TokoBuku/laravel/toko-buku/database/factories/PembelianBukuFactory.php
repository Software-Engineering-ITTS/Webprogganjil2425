<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PeminjamanBuku;
use App\Models\TokoBuku;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\peminjaman-buku>
 */
class PembelianBukuFactory extends Factory
{
    protected $model = PembelianBuku::class; // Gunakan model yang benar

    public function definition(): array
    {
        return [
            'nama_pembeli' => fake()->name(),
            'tanggal_membeli' => fake()->date(),
            'ID_buku' => TokoBuku::factory(), // Menghubungkan ke factory TokoBuku
        ];
    }
}

