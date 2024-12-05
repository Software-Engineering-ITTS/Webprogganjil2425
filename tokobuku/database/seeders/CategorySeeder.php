<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['nama' => 'Fiksi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Non-Fiksi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Biografi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknologi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
