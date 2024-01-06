<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //'user' is created i UserController
        // if($request->path()=="login" && $request->session()->has('user')){
        //     return redirect('/');
        // }
        // return $next($request);

        $path = $request->path();
        if(($path=='login'|| $path=='register') && Session::get('user')){
            return redirect('/');
        }
        return $next($request);
    }
}
