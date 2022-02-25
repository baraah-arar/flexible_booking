<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // !auth()->check()
        if(!(auth()->user()->role == 2 || auth()->user()->role == 3)){
            // abort(code:403);
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
