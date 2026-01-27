<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
     public function halLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            sweetalert()->success('Login berhasil.');
            return redirect()->intended('/data-siswa');
        }else{
            sweetalert()->error('Login gagal. Periksa email dan password Anda.');
            return redirect('/login')->withInput();
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        sweetalert()->success('Anda telah logout.');
        return redirect('/login');
    }
}
