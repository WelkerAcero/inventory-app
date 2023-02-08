<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequireSession;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function loader()
    {
        return view('preloader');
    }

    public function auth(RequireSession $request): \Illuminate\Http\JsonResponse
    {
        try {

            if (strlen($request->input('password')) <= 6) {
                $res = 'Error - El campo password debe ser mayor a 6 caracteres';
                return view('login.login', ['msgErr' => $res]);
            }

            if ($token = Auth::attempt($request->only('email', 'password'))) {
                // Authentication passed... now check the role_id
                if (Auth::user()->role_id === 2) {

                    return response()->json([
                        'user' => Auth::user(),
                        'token' => $token,
                        /* 'token_type' => 'Bearer', */
                        'expires_in' => 60 * 60
                    ], 200);
                }
                return response()->json(['error' => 'No autorizado'], 403);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
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
