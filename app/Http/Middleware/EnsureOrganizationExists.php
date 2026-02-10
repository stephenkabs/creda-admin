<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureOrganizationExists
{
    public function handle(Request $request, Closure $next)
    {
        if (
            auth()->check() &&
            auth()->user()->organization_id === null
        ) {
            return redirect()->route('setup.institution');
        }

        return $next($request);
    }
}
