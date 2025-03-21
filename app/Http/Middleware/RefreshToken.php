<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredExecption;
use Tymon\JWTAuth\Exceptions\HttpResponseException;

class RefreshToken extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $this->checkForToken($request);

            if($request->user = JWTAuth::parseToken()->authenticate())
            {
                return $next($request);
            }

            throw new AuthenticationException('Unauthorized', []);
        } catch (TokenExpiredException $e) {
            throw new HttpResponseException(response()->json([
                'message' => 'Token expired'
            ], 401));
        }catch (\Exception $e) {
            throw new AuthenticationException('Unauthorized', []);
        }
    }
}
