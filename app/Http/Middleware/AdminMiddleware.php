<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = JWTAuth::parseToken()->authenticate();
        if ($user && ($user->role->name === 'kecamatan' || $user->role->name === 'pusat')) {
            return $next($request);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User bukan Admin Kecamatan'
            ], 401);
        }

    }
}
