<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
{
    if (!Auth::check()) {
        abort(403, 'User is not authenticated.');
    }

    $user = Auth::user();
    \Log::info('User Roles:', $user->getRoleNames()->toArray()); // Log roles user

    if (!$user->hasRole($role)) {
        abort(403, 'User does not have the right roles.');
    }

    return $next($request);
}

}
