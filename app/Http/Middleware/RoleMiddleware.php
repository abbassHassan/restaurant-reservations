<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        Log::info('RoleMiddleware invoked');
        if (Auth::check()) {
            Log::info('User role: ' . Auth::user()->role);
            if (Auth::user()->role === $role) {
                Log::info('User authorized');
                return $next($request);
            } else {
                Log::info('User role does not match required role');
            }
        } else {
            Log::info('User not authenticated');
        }

        abort(403, 'Unauthorized action.');
    }
}
