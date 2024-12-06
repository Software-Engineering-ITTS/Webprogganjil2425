<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\TokoBuku::factory()->create([
            // 'name' => 'Test User',
            // 'email' => 'test@example.com',
            'nama_buku' => 'lorem',
            'status_buku' => 1,
            'tanggal_terbit_buku' => fake()->date(),
        ]);
    }
}
