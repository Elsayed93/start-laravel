<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class myadmin
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

        // $admin = auth('admin');
        return $next($request);
    }
}
