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
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\KelasResource;
use App\Filament\Resources\MateriResource;
use App\Filament\Resources\SiswaResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    // Konfigurasi panel admin utama
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin') 
            ->path('akademi') 
            ->brandLogoHeight('4rem') 
            ->brandLogo(asset('images/akademi-pl.png')) 
            ->font('Roboto') 
            ->login()
            ->topNavigation()
            ->colors([
                'primary' => Color::Purple,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class, // Menambahkan halaman Dashboard
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class, 
            ])
            ->middleware([
                // Middleware untuk pengelolaan session dan autentikasi
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
            ->authMiddleware([
                Authenticate::class, // Middleware autentikasi utama
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make()) // Plugin untuk manajemen role dan permission
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    // Grup navigasi untuk dashboard
                    NavigationGroup::make('Dashboard')
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn (): string => Dashboard::getUrl()),
                        ]),

                    // Grup navigasi untuk resources Class
                    NavigationGroup::make('Class')
                        ->items([
                            ...KelasResource::getNavigationItems(),
                            ...MateriResource::getNavigationItems(),
                        ]),

                    // Grup navigasi untuk pendaftaran siswa
                    NavigationGroup::make('Register Siswa')
                        ->items([
                            ...SiswaResource::getNavigationItems(),
                        ]),

                    // Grup navigasi untuk pengaturan (Settings)
                    NavigationGroup::make('Setting')
                        ->items(array_filter([
                            // Resource User hanya untuk admin
                            auth()->user()->hasRole('admin') ? NavigationItem::make('User')
                                ->icon('heroicon-o-user-group')
                                ->isActiveWhen(fn (): bool => request()->routeIs([
                                    'filament.admin.resources.users.index',
                                    'filament.admin.resources.users.create',
                                    'filament.admin.resources.users.view',
                                    'filament.admin.resources.users.edit',
                                ]))
                                ->url(fn (): string => UserResource::getUrl()) : null,

                            // Resource Roles hanya untuk admin
                            // auth()->user()->hasRole('admin') ? NavigationItem::make('Roles')
                            //     ->icon('heroicon-o-user-group')
                            //     ->isActiveWhen(fn (): bool => request()->routeIs([
                            //         'filament.admin.resources.roles.index',
                            //         'filament.admin.resources.roles.create',
                            //         'filament.admin.resources.roles.view',
                            //         'filament.admin.resources.roles.edit',
                            //     ]))
                            //     ->url(fn (): string => '/admin/roles') : null,

                            // // Resource Permissions hanya untuk admin
                            // auth()->user()->hasRole('admin') ? NavigationItem::make('Permissions')
                            //     ->icon('heroicon-o-lock-closed')
                            //     ->isActiveWhen(fn (): bool => request()->routeIs([
                            //         'filament.admin.resources.permissions.index',
                            //         'filament.admin.resources.permissions.create',
                            //         'filament.admin.resources.permissions.view',
                            //         'filament.admin.resources.permissions.edit',
                            //     ]))
                            //     ->url(fn (): string => '/admin/permissions') : null,
                        ])),
                ]);
            });
    }
}
