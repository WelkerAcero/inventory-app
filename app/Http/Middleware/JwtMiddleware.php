<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (JWTAuth::parseToken()->authenticate()) {
                return $next($request);
            } else {
                return response(['status' => 'Unauthorized: No estas autenticado'], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e) {
            return response(['status' => 'Token invalido'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response(['status' => 'Token invalido'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response(['status' => 'El token ha expirado'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response(['status' => 'El token no ha sido encontrado'], 404);
        } catch (Exception $e) {
            return response(['status' => 'El token no ha sido encontradoooo'], 404);
        }
    }
}
