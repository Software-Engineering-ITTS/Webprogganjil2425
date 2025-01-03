<?php

namespace Database\Seeders;

use App\Models\profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewregistrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        profile::create([
            'nama' => 'Ariana Hechalina',
            'alamat' => 'Jl.Sidojangkung RT.01 RW.01, Menganti Gresik',
            'email' => 'iniariana@gmail.com',
            'telepon' => '098734567621',
            'foto' => 'default_profile.png'
        ]);
    }
}
