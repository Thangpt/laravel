<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class IsLogin
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
        if(Auth::check() && Auth::user()->level<1)
        {
            \View::share('categories',\App\Category::where('level', 1)->get());
            \View::share('sub_categories', \App\Category::where('level', 2)->get());

            return $next($request);
        }else{
            return redirect('/');
        }

    }
}
