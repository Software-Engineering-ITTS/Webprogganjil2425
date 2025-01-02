<?php

// namespace Database\Factories;

// use App\Models\Gaji;
// use App\Models\Karyawan;
// use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\gaji>
 */
// class GajiFactory extends Factory
// {
    // protected $model = Gaji::class;

    // public function definition()
    // {
    //     // Ambil data karyawan secara acak
    //     $karyawan = Karyawan::inRandomOrder()->first();

    //     // Jika tidak ada karyawan, kembalikan nilai kosong
    //     if (!$karyawan) {
    //         return [];
    //     }

//         // Hitung total hadir secara random (20 - 26 hari kerja dalam 1 bulan)
//         $totalHadir = $this->faker->numberBetween(20, 26);

//         // Hitung jumlah Alpha (hari tidak hadir tanpa keterangan)
//         $totalAlpha = 26 - $totalHadir;

//         // Potongan (misal: 50.000 per Alpha)
//         $potongan = $totalAlpha * 50000;

//         // Hitung gaji bersih
//         $gajiBersih = ($karyawan->gaji_pokok + $karyawan->tunjangan) - $potongan;

//         return [
//             'karyawan_id' => $karyawan->id,
//             'total_hadir' => $totalHadir,
//             'potongan' => $potongan,
//             'gaji_bersih' => $gajiBersih,
//         ];
//     }
// }
