<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = auth()->user();
        if (!$user || $user->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
