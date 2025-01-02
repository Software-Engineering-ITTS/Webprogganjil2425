<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        // Cek jika pengguna sudah login
        if (Auth::check()) {
            // Mendapatkan instance user
            $user = Auth::user();

            // Jika ini adalah instance model User
            if ($user instanceof \App\Models\User) {
                // Menggunakan save untuk menyimpan perubahan
                $user->last_login = now();
                $user->save();
            }
        }

        return $next($request);
    }
}
