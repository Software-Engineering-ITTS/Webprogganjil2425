<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::create([
            'name' => 'fiksi',
            'description' => 'Buku yang berisi khayalan dan cerita yang tidak terikat pada fakta atau sejarah. Contohnya novel, cergam, dan komik.',
        ]);
    }
}
