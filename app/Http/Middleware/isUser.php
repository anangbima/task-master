<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            // Handle unauthorized access (e.g., redirect to login)
            return redirect()->route('login');
        }

        if ($user->role == 'user') {
            return $next($request);
        }else{
            return redirect('admin');
        }

        // Handle unauthorized access for non-admin users (e.g., redirect to a specific route)
        return redirect()->route('unauthorized');
    }
}
