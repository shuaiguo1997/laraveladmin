<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLong
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
        if($request->long <= 200){
            dd('你没有比200长');
        }

        return $next($request);
    }
}
