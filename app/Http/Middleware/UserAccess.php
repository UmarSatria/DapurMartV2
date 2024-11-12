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

        // Periksa akses untuk setiap role
        if ($user->role === 'Admin') {
            return $next($request); // Admin memiliki akses ke semua halaman
        }

        if ($user->role === 'Seller') {
            // Cek jika route yang diminta adalah salah satu dari route yang diizinkan untuk Seller
            if ($request->routeIs('seller.dashboard') ||
                $request->routeIs('barang.*')) {
                return $next($request); // Seller memiliki akses ke halaman tersebut
            }
        }

        if ($user->role === 'User') {
            if ($request->routeIs('grosir.index')) {
                return $next($request); // User memiliki akses ke halaman grosir
            }
        }

        // Jika tidak sesuai dengan role, munculkan error Unauthorized
        abort(403, 'Unauthorized');
    }
}
