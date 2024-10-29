<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  ...$roles  Daftar role yang diizinkan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Log informasi role untuk debugging
        \Log::info('User role:', ['user_role' => $user->role, 'required_roles' => $roles]);

        // Periksa apakah role pengguna ada dalam daftar role yang diizinkan
        if (!in_array($user->role, $roles)) {
            \Log::error('Unauthorized access attempt', [
                'user_role' => $user->role,
                'required_roles' => $roles,
                'attempted_route' => $request->path()
            ]);
            abort(403, 'Unauthorized');
        }

        // Lanjutkan request jika role sesuai
        return $next($request);
    }
}
