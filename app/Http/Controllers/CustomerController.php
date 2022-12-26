<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class CustomerController extends Controller
{
    //Este controlador lista clientes en el dashboard Admin

    public function register(RegisterRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('login');
    }

    public function index()
    {
        $data = User::where('role_id', '!=', 1)->get();
        return view('customers.index', compact('data'));
    }


    public function store(RegisterRequest $request)
    {
        $data = User::create($request->validated());
        return redirect()->route('login');
    }

    public function destroy(User $id)
    {
        $id->delete();
        return redirect()->route('customer.index');
    }
}
