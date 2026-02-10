<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOnboarding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next)
{
    if (
        auth()->check() &&
        auth()->user()->organization_id === null &&
        ! $request->is('setup/*')
    ) {
        return redirect()->route('setup.institution');
    }

    return $next($request);
}


}
