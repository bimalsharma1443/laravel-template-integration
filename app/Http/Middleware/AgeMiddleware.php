<?php

namespace App\Http\Middleware;

use Closure;

class AgeMiddleware
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
        //echo 'http://'.$_SERVER['HTTP_HOST'];

        if(($request->path() != 'login') &&  ($request->path() != 'auth')  && (!$request->session()->has('id'))){
                $route = $request->path();
                return redirect('login?route='.$route);
        }

        return $next($request);
    }
}
