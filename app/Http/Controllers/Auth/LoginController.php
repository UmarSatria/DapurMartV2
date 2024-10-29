<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('Admin')) {
            return redirect()->route('home');
        } else if ($user->hasRole('Seller')) {
            return redirect()->route('seller.dashboard');
        } else if ($user->hasRole('User')) {
            return redirect()->route('user.dashboard');
        }

        // Jika peran tidak cocok, redirect ke halaman default
        return redirect()->route('login');
    }
}
