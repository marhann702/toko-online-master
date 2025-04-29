<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCustumer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle (Request $request, Closure $next): Response
    {
        return $next($request);
    }
    public function handle (Request $request, Closure $next): Response
    {
        if (auth()->check() && auth() ->user()  ->role ==2){
            return $next($request);
        }

        return redirect('/auth/redirect') ->with('msgError', 'Anda Harus Login Sebagai Custumer');
    }
}
