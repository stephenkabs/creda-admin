<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureOrganizationIsActive
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $organization = Auth::user()->organization;

        if ($organization && !$organization->active) {

            Auth::logout(); // IMPORTANT

            return redirect()->away('https://app.neurasofts.com/');
        }

        return $next($request);
    }
}
