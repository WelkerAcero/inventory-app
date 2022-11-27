<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $data = User::create($request->validated());
        return redirect()->route('login');
    }
}
