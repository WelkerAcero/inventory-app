<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestSessionWeb;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Exception;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login.login');
    }

    public function loader()
    {
        return view('preloader');
    }

    public function authenticateUser(RequestSessionWeb $request)
    {
        try {

            if (strlen($request->input('password')) <= 6) {
                $res = 'Error - El campo password debe ser mayor a 6 caracteres';
                return view('login.login', ['msgErr' => $res]);
            }

            if (!Auth::attempt($request->only('email', 'password'))) {
                $res = 'Error - Usuario no autorizado';
                return view('login.login', ['msgErr' => $res]);
            }

            // Authentication passed..
            $requestName = User::select('name')->where('email', '=', $request->input('email'))->first();
            if (Auth::user()->role_id === 1) {
                $request->session()->put('authenticated', $requestName->name);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            return $e->getMessage();
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
