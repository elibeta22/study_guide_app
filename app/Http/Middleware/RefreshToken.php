<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    'code' => 401,
                    'message' => 'unauthorized',
                    'status' => 'error'
                ], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException  $e) {
            // If the token is expired, then it will be refreshed and added to the headers

            try {
                $refreshed = JWTAuth::refresh(JWTAuth::getToken());
                $user = JWTAuth::setToken($refreshed)->toUser();
                header('Authorization: Bearer ' . $refreshed);

                return response()->json([
                    'code' => 200,
                    'message' => 'Token Has been refreshed.',
                    'status' => 'success'
                ], 200);
            } catch (\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $e) {
                return response()->json([
                    'code' => 401,
                    'status' => 'unauthorized',
                    'message' => 'The token has been blacklisted'
                ], 401);
            } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json([
                    'code' => 401,
                    'message' => $e->getMessage(),
                    'status' => 'error'
                ], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'code' => 401,
                'message' => 'Invalid token or token not found.',
                'status' => 'error'
            ], 401);
        }

        return  $next($request);
    }
}
