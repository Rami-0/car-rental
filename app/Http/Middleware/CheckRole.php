<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards): mixed
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has the required role
        if ($user && $this->hasRequiredRole($user, ...$guards)) {
            return $next($request);
        }

        return redirect('/'); // Replace with the URL to redirect if the user doesn't have the required role
    }

    /**
     * Check if the user has the required role.
     *
     * @param $user
     * @return bool
     */
    protected function hasRequiredRole($user, $requiredRoll): bool
    {
        // Replace 'admin' with the role you want to check + if you have multiple roles just add || condition or check as an array.
        return $user->role === $requiredRoll;
    }
}
