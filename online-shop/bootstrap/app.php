<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Pastikan Anda sudah menginstal Spatie Laravel Permission:
// composer require spatie/laravel-permission
// dan melakukan publish + migrate.

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Di sinilah Anda mendaftarkan alias middleware.
        // Pastikan namespace dan nama class Spatie sesuai.
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // Jika Anda memiliki custom middleware lain,
        // silakan tambahkan di sini juga.
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Anda dapat menyesuaikan konfigurasi penanganan exceptions di sini.
    })
    ->create();
