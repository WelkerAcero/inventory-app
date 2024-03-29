<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Todas excepto login debe estar autenticado para acceder
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }


}
