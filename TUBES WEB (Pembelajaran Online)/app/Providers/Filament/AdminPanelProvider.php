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
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
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
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class, 
            ])
            ->middleware([
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
                Authenticate::class,
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->items([
                    NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                        ->url(fn (): string => Dashboard::getUrl()),

                    ...SiswaResource::getNavigationItems(),
                ])->groups([
                    NavigationGroup::make('Class Management')
                        ->items([
                            ...KelasResource::getNavigationItems(),
                            ...MateriResource::getNavigationItems(),
                        ]),

                    // NavigationGroup::make('Settings')
                    //     ->items(array_filter([
                    //         // Resource User untuk admin
                    //         auth()->user()->hasRole('admin') ? NavigationItem::make('User')
                    //             ->icon('heroicon-o-user-group')
                    //             ->isActiveWhen(fn (): bool => request()->routeIs([
                    //                 'filament.admin.resources.users.index',
                    //                 'filament.admin.resources.users.create',
                    //                 'filament.admin.resources.users.view',
                    //                 'filament.admin.resources.users.edit',
                    //             ]))
                    //             ->url(fn (): string => UserResource::getUrl()) : null,

                    //         // Roles untuk admin
                    //         auth()->user()->hasRole('admin') ? NavigationItem::make('Roles')
                    //             ->icon('heroicon-o-cog')
                    //             ->url('/akademi/roles') : null,

                    //         // Permissions untuk admin
                    //         auth()->user()->hasRole('admin') ? NavigationItem::make('Permissions')
                    //             ->icon('heroicon-o-lock-closed')
                    //             ->url('/akademi/permissions') : null,
                        // ])),
                ]);
            });
    }
}
