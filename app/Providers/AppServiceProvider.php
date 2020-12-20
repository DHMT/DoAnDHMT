<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\type_products;
use App\Cart;
use Session;
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
        view()->composer('root',function($view){
            $type = type_products::all();
            $view->with('type',$type);
        });
        view()->composer('root',function($view)
        {
           if(Session('cart')){
            $oldCart=Session::get('cart');
            $cart = new Cart($oldCart);
            $view->with(['cart'=>session::get('cart'),'spmua'=>$cart->items,'thanhtien'=>$cart->totalPrice,'sluong'=>$cart->totalQty]);
           }
           
        });
         view()->composer('GiaoDien.dathang',function($view)
        {
           if(Session('cart')){
            $oldCart=Session::get('cart');
            $cart = new Cart($oldCart);
            $view->with(['cart'=>session::get('cart'),'spmua'=>$cart->items,'thanhtien'=>$cart->totalPrice,'sluong'=>$cart->totalQty]);
           }
           
        });
    }
}
