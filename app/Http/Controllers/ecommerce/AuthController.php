<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RequestSessionApi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth.customer:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        if ($user = User::create($request->validated())) {
            return response()->json(
                [
                    'message' => 'CUENTA CREADA EXITOSAMENTE!',
                    'user' => $user
                ],
                201
            );
        }
    }

    public function login(RequestSessionApi $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) { // if want Auth::attempt($credentials) but true is given
            return response()->json(
                [
                    'errors' => [
                        'Unauthorized' => ['Las credenciales son incorrectas']
                    ]
                ],
                401
            );
        }
        return response()->json([
            'user' => Auth::user(),
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 60 * 60
        ], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        try {
            $user = User::find(Auth::id());
            return response()->json(['user' => $user]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth())->refresh();
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 3600
        ]);
    }
}
