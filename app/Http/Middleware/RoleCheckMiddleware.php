<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (in_array($user->role, $roles)) {
            // Allow the request to continue
            return $next($request);
        }

        // Redirect based on role
        if ($user->role === 'employer') {
            return redirect()->route('employer.dashboard');
        }

        if ($user->role === 'developer') {
            return redirect()->route('developer.dashboard');
        }

        // Fallback: no role match
        abort(403, 'Unauthorized');
    }
}
