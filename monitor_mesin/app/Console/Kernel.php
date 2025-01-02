<?php

namespace App\Console;

use App\Models\Kondisi_Mesins;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $kondisiMesins = Kondisi_Mesins::all();

            foreach ($kondisiMesins as $kondisi) {
                $elapsedTime = now()->diffInSeconds($kondisi->last_checked);

                if ($elapsedTime < 60) {
                    $temperature = rand(30, 50);
                    $status = 'normal';
                } else {
                    $temperature = rand(50, 80);
                    $status = 'overheat';
                }

                $kondisi->update([
                    'temperature' => $temperature,
                    'status' => $status,
                    'last_checked' => now(),
                ]);
            }
        })->everyMinute(); // Jalankan setiap detik
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
