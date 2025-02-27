<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! in_array(auth()->user()->role, $roles)) {
            return redirect()->route('dashboard');

        }

        return $next($request);
    }
}
