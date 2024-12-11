<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Determine the locale from the session, route, or request headers
        $locale = $request->route('locale') // From the route prefix
            ?? $request->header('X-Locale') // From Inertia header
            ?? session('locale') // From session
            ?? config('app.locale'); // Default fallback

        // Validate the locale
        if (in_array($locale, config('app.locales', ['en', 'fr', 'es', 'ar','zh', 'id','de']))) {
            App::setLocale($locale); // Set the application locale
            session(['locale' => $locale]); // Save locale to session
        }

        return $next($request);
    }
    
}
