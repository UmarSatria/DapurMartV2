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
        $userRole = Auth::user()->role;

        if (auth()->user()->role == 'Admin') {
            return $next($request);
        } elseif ($userRole == 'User') {
            return to_route('grosir.index');
        } else if ($userRole == 'Seller') {
            return to_route('seller.dashboard');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
