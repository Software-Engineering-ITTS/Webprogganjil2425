<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('authors')->insert([
            ['nama' => 'Seta', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rapid', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Arasy', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yanto', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
