<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthenticationController extends Controller
{
    // Menampilkan form login
    public function login()
    {
        // Menampilkan form login
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil, arahkan pengguna ke dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus sesi pengguna

        // Jika Anda ingin menghapus sesi atau data lain, lakukan di sini

        return redirect('/login')->with('status', 'Anda telah logout.'); // Redirect ke halaman login
    }
}
