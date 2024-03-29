<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Exception;


class AuthController extends Controller
{
    private $email;
    private $displayName;

    public function __construct($emailParam, $displayNameParam)
    {
        $this->email = $emailParam;
        $this->displayName = $displayNameParam;
    }

    public static function createSession($credentials = array())
    {

        /* $user = USer::where('email', $credentials['email'])->select('role_id')->get();
        $guardType = $user[0]->role_id === 1 ? 'admin' : 'customer'; */
        try {
            if (Auth::attempt($credentials)) {
                // Authentication passed..
                $requestName = User::select('name')->where('email', '=', $credentials['email'])->first(); //query
                // initialize the construct and give arguments
                return new AuthController($credentials['email'], $requestName->name);
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function showDisplayName()
    {
        return $this->displayName;
    }

    public function showEmail()
    {
        return $this->email;
    }
}
