<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Method untuk menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Method untuk memproses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman dashboard atau halaman yang sesuai
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal, kembalikan ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}