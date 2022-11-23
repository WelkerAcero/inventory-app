<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequireSession;
use App\http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

use Exception;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }
    
    public function index()
    {
        return view('login.login');
    }

    public function loader()
    {
        return view('preloader');
    }

    public function register()
    {
        return view('login.register');
    }

    public function auth(RequireSession $request)
    {
        if (strlen($request->input('password')) >= 6) 
        {
            $res = AuthController::createSession($request->only('email', 'password'));
            if (!empty(AuthController::showDisplayName()))
            {
                $request->session()->put('authenticated', $res->showDisplayName());
                if (Auth::check()) {
                    return redirect()->intended('dashboard');
                }
            } else {
                $res = 'Error - credenciales incorrectas';
                return view('login.login', ['msgErr' => $res]);
            }
        } else {
            $res = 'Error - El campo password debe ser mayor a 6 caracteres';
            return view('login.login', ['msgErr' => $res]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('authenticated');
        return redirect()->route('preloader');
    }
}
