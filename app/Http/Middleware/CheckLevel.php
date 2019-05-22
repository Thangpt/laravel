<?php

namespace App\Http\Middleware;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckLevel
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
        if(Auth::check()&&Auth::user()->level>1)
        {
            \View::share('variable',[count(Order::all()->where('is_send',null)),count(Product::all()),count(User::all()),count(Order::all())]);
            return $next($request);
        }else{
            return redirect('/');
        }

    }
}
