<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default() // Setting the default panel
            ->id('admin')
            ->path('admin')
            ->brandLogoHeight('4rem')
            ->brandLogo(asset('images/akademi-pl.png'))
            ->font('Roboto') // Ganti font
            ->login() // Pengaturan login standar
            ->colors([ // Mengubah warna tema
                'primary' => Color::Purple, // Mengganti warna utama ke ungu
                'secondary' => Color::Teal, // Mengganti warna sekunder ke teal
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([ // Menambahkan halaman Dashboard atau lainnya
                Pages\Dashboard::class, // Gunakan halaman dashboard Filament
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([ // Menambahkan widget
                Widgets\AccountWidget::class, // Menambahkan widget Akun pengguna
            ])
            ->middleware([ // Pengaturan middleware
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([ // Pengaturan autentikasi
                Authenticate::class,
            ]);
    }
}
