<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function index()
    {
        $documentType = DB::table('document_types')->select('id', 'doc_name')->get();
        $countries = DB::table('countries')->select('id', 'cou_name')->get();
        $departments = DB::table('departments')->select('id', 'dep_name')->get();
        $roles = DB::table('roles')->select('id', 'rol_name')->get();
        return view('login.login', compact('documentType', 'countries', 'departments', 'roles'));
    }

    public function loader()
    {
        return view('preloader');
    }

    public function auth(RequireSession $request)
    {
        try {

            if (strlen($request->input('password')) >= 6) {

                if (Auth::attempt($request->only('email', 'password'))) {
                    // Authentication passed..
                    $requestName = User::select('name')->where('email', '=', $request->input('email'))->first();

                    if (Auth::user()->role_id === 1) {
                        $request->session()->put('authenticated', $requestName->name);
                        return redirect()->intended('dashboard');
                    } else {
                        $request->session()->put('authenticated_customer', $requestName->name);
                        return redirect()->intended('home/ecommerce');
                    }
                } else {
                    $res = 'Error - credenciales incorrectas';
                    return view('login.login', ['msgErr' => $res]);
                }
            } else {
                $res = 'Error - El campo password debe ser mayor a 6 caracteres';
                return view('login.login', ['msgErr' => $res]);
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
