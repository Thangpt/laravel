<?php

namespace App\Providers;

use App\Cart;
use App\User;
use App\UserCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $data=[];
        $users=User::all();
        $carts=UserCart::all();
        foreach ($users as $user)
        {   $count=0;
            foreach ($carts as $cart){
                if($user->id==$cart->user_id){
                    $count+=$cart->quantity;
                }
            }
            $data[$user->id]=$count;
        }



        \View::share('total_cart',$data);
        \View::share('all_cart',UserCart::all());
    }
}
