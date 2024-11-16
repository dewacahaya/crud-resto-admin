<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Validasi kredensial
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Email atau Password salah.'])->with('failed', "Email atau Password salah");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "Berhasil Logout");
    }
}
