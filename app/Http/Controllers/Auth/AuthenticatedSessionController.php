<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

          $role = Auth::user()->role;

    // Redirigir según el rol
    switch ($role) {
        case 'admin':
            return redirect()->route('dashboard'); // Ruta para administradores
        case 'distribuidor':
            return redirect()->route('marketplace.index'); // Ruta para distribuidores
        case 'cliente':
            return redirect()->route('marketplace.index'); // Ruta para clientes
        default:
            return redirect('/login'); // Ruta por defecto
    }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
