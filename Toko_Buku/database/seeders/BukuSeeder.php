<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'title' => 'Spongebob Squarepants',
            'author' => 'Stephen Hillenburg',
            'description' => 'Buku Spongebob Squarepants',
            'price' => 15000,
            'stock' => 28,
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj9AH3aLBWdyIE3SQbsOnM0TcMCnW0tZ_PTA&s',
        ]);
    }
}
