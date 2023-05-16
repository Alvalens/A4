<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceWelcome
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure $next
     * @param array $excludedRoutes
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$excludedRoutes)
    {
        $routeName = $request->route()->getName();

        // Check if the current route is in the excluded routes list
        if (in_array($routeName, $excludedRoutes)) {
            return $next($request);
        }

        // Check if the user has a welcome cookie
        if (!$request->cookie('visited_welcome')) {
            // Redirect the user to the welcome page
            return redirect()->route('start');
        }

        return $next($request);
    }
}
