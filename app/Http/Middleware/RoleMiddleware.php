<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user || !$this->userHasRoles($user, $roles)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }

    protected function userHasRoles($user, $roles)
    {
        $userRoles = $user->roles->pluck('name')->toArray();

        foreach ($roles as $role) {
            if (in_array($role, $userRoles)) {
                return true;
            }
        }

        return false;
    }
}
