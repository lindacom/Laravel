<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Session;
use Closure;
use Auth;

class Authenticate extends Middleware
{
/**
     * A page has middleware auth meaning user must sign in. This method gets the path the user should be returned to after being authenticated.
     * n.b user post sign in action the user controller in always redirects to the user profile
     * in auth attempt it checks if session has old url
          */

          public function handle($request, Closure $next, $guard = null) {
              if (Auth::guard($guard)->guest()) {
                  if($request->ajax() || $request->wantsJson()) {
                      return response('Unauthorized', 401);
                  } else {
                      Session::put('oldUrl', $request->url());
                      return redirect()->route('user.signin');
                  }
                  }
                  return $next($request);
              }
          

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
