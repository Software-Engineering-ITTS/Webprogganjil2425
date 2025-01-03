<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pasien::create([
            'nama' => 'Muhammad',
            'alamat' => 'Jl. Menganti',
            'tempat_kelahiran' => 'Gresik',
            'gender' => 'Laki Laki',
            'umur' => '16-20 Tahun',
            'dokter_id' => 1,
            'keluhan' => 'Agak Demam',
            'kondisi' => 'Rentang Normal',
            'konsultasi' => 'Tidak',
            'antrian' => ''

        ]);
    }
}
