<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maintenance;

class MaintenanceSeeder extends Seeder
{
    public function run()
    {
        Maintenance::create([
            'mesin_id' => 1,
            'jadwal_id' => 1,
            'user_id' => 1,
            'status' => 'Pending',
            'deskripsi_perawatan' => 'Perawatan rutin bulanan',
        ]);
    }
}
