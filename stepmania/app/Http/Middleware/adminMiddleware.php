<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()){
            return to_route('welcome');
        }
        if (Auth::user()->role !=='admin'){
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
