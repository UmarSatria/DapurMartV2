<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Jika pengguna belum terverifikasi, arahkan ke halaman verifikasi
        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        // Redireksi berdasarkan peran pengguna
        if ($user->hasRole('Admin')) {
            return redirect('/home');
        } elseif ($user->hasRole('Seller')) {
            return redirect()->route('seller.dashboard');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user.dashboard');
        }

        // Jika peran tidak cocok, redirect ke halaman default
        return redirect('/login');
    }
}
