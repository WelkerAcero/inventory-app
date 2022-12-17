<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EcommerceController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth.customer']);
    }

    public function index()
    {
        return view('ecommerce.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->forget('authenticated_customer');
        return redirect()->route('preloader');
    }
}
