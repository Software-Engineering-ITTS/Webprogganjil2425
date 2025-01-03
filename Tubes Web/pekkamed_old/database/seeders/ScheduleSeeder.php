<?php

namespace Database\Seeders;

use App\Models\schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data dummy nya sementara saja

        schedule::insert([
            [
                'nama' => 'Dr. Andi Saputra',
                'hari' => '2024-12-30',
                'waktu' => '09:00:00',
                'spesialis' => 'Dokter Umum',
            ],
            [
                'nama' => 'Dr. Siti Rahmawati',
                'hari' => '2024-12-30',
                'waktu' => '10:00:00',
                'spesialis' => 'Dokter Spesialis Anak',
            ],
            [
                'nama' => 'Dr. Budi Santoso',
                'hari' => '2024-12-30',
                'waktu' => '11:00:00',
                'spesialis' => 'Dokter Gigi',
            ],
            [
                'nama' => 'Dr. Maria Kusuma',
                'hari' => '2024-12-30',
                'waktu' => '12:00:00',
                'spesialis' => 'Dokter Spesialis Kulit dan Kelamin',
            ],
            [
                'nama' => 'Dr. Faisal Arief',
                'hari' => '2024-12-30',
                'waktu' => '13:00:00',
                'spesialis' => 'Dokter Telinga, Hidung, dan Tenggorokan (THT)',
            ],
            [
                'nama' => 'Dr. Nila Oktaviani',
                'hari' => '2024-12-30',
                'waktu' => '14:00:00',
                'spesialis' => 'Dokter Spesialis Mata',
            ],
            [
                'nama' => 'Dr. Johan Haryanto',
                'hari' => '2024-12-30',
                'waktu' => '15:00:00',
                'spesialis' => 'Dokter Spesialis Kandungan',
            ],
            [
                'nama' => 'Dr. Linda Lestari',
                'hari' => '2024-12-30',
                'waktu' => '16:00:00',
                'spesialis' => 'Dokter Spesialis Jantung',
            ],
            [
                'nama' => 'Dr. Rudi Setiawan',
                'hari' => '2024-12-30',
                'waktu' => '17:00:00',
                'spesialis' => 'Dokter Spesialis Bedah',
            ],
            [
                'nama' => 'Dr. Amelia Putri',
                'hari' => '2024-12-30',
                'waktu' => '18:00:00',
                'spesialis' => 'Dokter Spesialis Saraf',
            ],
            [
                'nama' => 'Dr. Joko Prasetyo',
                'hari' => '2024-12-30',
                'waktu' => '19:00:00',
                'spesialis' => 'Dokter Spesialis Penyakit Dalam',
            ],
            [
                'nama' => 'Dr. Rina Agustin',
                'hari' => '2024-12-30',
                'waktu' => '20:00:00',
                'spesialis' => 'Dokter Spesialis Paru',
            ],
            [
                'nama' => 'Dr. Hendra Yudha',
                'hari' => '2024-12-30',
                'waktu' => '21:00:00',
                'spesialis' => 'Dokter Spesialis Rheumatologi',
            ],
            [
                'nama' => 'Dr. Dwi Suryani',
                'hari' => '2024-12-30',
                'waktu' => '22:00:00',
                'spesialis' => 'Dokter Spesialis Psikiatri',
            ],
            [
                'nama' => 'Dr. Indah Wulandari',
                'hari' => '2024-12-30',
                'waktu' => '23:00:00',
                'spesialis' => 'Dokter Spesialis Bedah Plastik',
            ],
            [
                'nama' => 'Dr. Eka Pratama',
                'hari' => '2024-12-30',
                'waktu' => '09:30:00',
                'spesialis' => 'Dokter Spesialis Gizi',
            ],
            [
                'nama' => 'Dr. Fajar Nursyam',
                'hari' => '2024-12-30',
                'waktu' => '10:30:00',
                'spesialis' => 'Dokter Spesialis Radiologi',
            ],
            [
                'nama' => 'Dr. Nadia Triana',
                'hari' => '2024-12-30',
                'waktu' => '11:30:00',
                'spesialis' => 'Dokter Spesialis Rehabilitasi Medik',
            ]
        ]);
    }
}
