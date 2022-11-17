<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


class AuthController extends Controller
{
    private $email;
    private static $displayName;

    public function __construct($emailParam, $displayNameParam)
    {
        $this->email = $emailParam;
        self::$displayName = $displayNameParam;
    }

    public static function createSession($credentials = array())
    {
        try {
            if (Auth::attempt($credentials)) {
                // Authentication passed..
                $requestName = User::select('name')->where('email', '=', $credentials['email'])->first();//query
                 // initialize the construct and give arguments
                return new AuthController($credentials['email'], $requestName->name);
            }else{
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

/*     public function createNewUser($emailParam, $passwordParam, $displayNameParam)
    {
        try {
            $service->addUser($emailParam, $passwordParam, $displayNameParam);
            return new AuthUser($emailParam, $displayNameParam);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } */

    public static function showDisplayName()
    {
        return self::$displayName;
    }

    public function showEmail()
    {
        return $this->email;
    }
}
