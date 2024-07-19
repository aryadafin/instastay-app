<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->hasRole('super_admin')) {
            return redirect()->intended(route('dashboard.super_admin'));
        } elseif (Auth::user()->hasRole('customer')) {
            return redirect()->intended(route('dashboard.customer'));
        } else {
            return redirect()->intended('/');
        }
    }

    throw ValidationException::withMessages([
        'email' => [__('auth.failed')],
    ]);
}

}
