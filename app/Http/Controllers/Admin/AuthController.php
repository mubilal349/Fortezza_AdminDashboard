<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Add is_admin check
        if (Auth::attempt(array_merge($credentials, ['is_admin' => 1]))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or you are not an admin.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout();  // log out the user
    $request->session()->invalidate();  // invalidate session
    $request->session()->regenerateToken(); // regenerate CSRF token

    // redirect to admin login
    return redirect()->route('admin.login');
}
}
