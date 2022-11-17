<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequireSession;
use App\http\Controllers\AuthController;
use Exception;

class SessionController extends Controller
{
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
                return view('dashboard');
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
        $request->session()->forget('authenticated');
        return redirect('/preloader');
    }
}
