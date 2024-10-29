<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        \Log::info('User role:', ['role' => $user->role, 'current_route' => $request->route()->getName()]);

        if ($user->role === 'Admin') {
            return $next($request); // Admin dapat mengakses semua halaman yang dibutuhkan
        }

        if ($user->role === 'Seller' && $request->routeIs('seller.dashboard')) {
            return $next($request);
        }

        if ($user->role === 'User' && $request->routeIs('grosir.index')) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
