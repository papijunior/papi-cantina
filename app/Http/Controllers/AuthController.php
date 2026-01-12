<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostra a tela de login
    public function showLogin() {
        return view('auth.login');
    }

    // Processa a tentativa de login
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('caixa'); // Vai para o caixa se logar
        }

        return back()->withErrors([
            'email' => 'As credenciais não coincidem com nossos registros.',
        ]);
    }

    // Faz o logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
