<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHasAuthSecretKey
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Authorization') && $request->header('Authorization') === config('app.auth_secret_key')) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }
}
