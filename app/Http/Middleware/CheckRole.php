<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // cek apakah user sudah login atau belum
        if (!Auth::check()) {
            return redirect('login');
        }

        // get data user
        $user = Auth::user();

        // cek role
        if ($user['role'] == $role) {
            return $next($request);
        }

        return redirect('login');
    }
}
