<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // Redirect berdasarkan peran pengguna
                if ($user->hasRole('Admin')) {
                    return redirect()->route('home');
                } elseif ($user->hasRole('Seller')) {
                    return redirect()->route('seller.dashboard');
                } elseif ($user->hasRole('User')) {
                    return redirect()->route('user.dashboard');
                }

                // Jika peran tidak sesuai, redirect ke halaman default atau logout
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
