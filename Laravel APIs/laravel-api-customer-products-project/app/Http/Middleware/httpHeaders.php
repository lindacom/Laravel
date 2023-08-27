<?php

namespace App\Http\Middleware;

use Closure;

class httpHeaders
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
        $response = $next($request);
        $response->header('X-JOBS', 'come work for us');
        return $response;
    }
}
