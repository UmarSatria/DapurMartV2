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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect()->route('login'); // Jika belum login
    }

    $user = Auth::user();

    // Log informasi role untuk debugging
    \Log::info('User role:', ['user_role' => $user->role, 'required_roles' => $roles]);

    // Debugging untuk role
    if (!in_array($user->role, $roles)) {
        \Log::error('Unauthorized access attempt', ['user_role' => $user->role]);
        abort(403, 'Unauthorized');
    }

    return $next($request);
}

}
