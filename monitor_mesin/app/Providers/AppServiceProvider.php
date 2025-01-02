<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Kondisi_Mesins;
use App\Models\Mesins;
use App\Models\User;
use App\Observers\HistoryObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.local' => 'id']);
        Carbon::setLocale('id');

        User::observe(HistoryObserver::class);
        Mesins::observe(HistoryObserver::class);
        Category::observe(HistoryObserver::class);
        Kondisi_Mesins::observe(HistoryObserver::class);
    }
}
