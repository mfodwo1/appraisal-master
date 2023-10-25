<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AppraiserMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user type is "Appraiser"
            if ($user->user_type === 'Appraiser') {
                // If the user is an appraiser and authenticated, proceed with the request.
                return $next($request);
            }
        }

        // If the user is not an appraiser or not authenticated, you can redirect to an unauthorized page.
        return redirect()->route('unauthorized'); // Define an 'unauthorized' route in your routes/web.php file.
    }
}
