<?php

namespace App\Providers;

use App\Cart;
use App\Product;
use App\ProductRepository;
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
        $products= Product::all();

        $product=[];
        foreach ($products as $item){
            $quantity=ProductRepository::where('product_id',$item->product_id);
            $count=0;
            foreach ($quantity as $temp){
                $count+=$temp->quantity;
            }
            $product[$item->product_id]=$count;
        }


        \View::share('products_quantity',$product);
        \View::share('total_cart',$data);
        \View::share('all_cart',UserCart::all());
        \View::share('categories',\App\Category::where('level', 1)->get());
        \View::share('sub_categories', \App\Category::where('level', 2)->get());
        \View::share('third_categories', \App\Category::where('level', 3)->get());


    }
}
