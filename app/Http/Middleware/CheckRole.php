<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna sudah terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login'); // Ganti dengan rute login Anda
        }

        // Cek role pengguna
        if (Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect atau abort jika role tidak cocok
        abort(403, 'Unauthorized');
    }
}
