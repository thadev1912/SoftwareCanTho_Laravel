<?php

namespace App\Providers;
use App\Helper\Product\SanphamInterface;
use App\Helper\Product\Sanpham;
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
        //Passport::ignoreRoutes();
        $this->app->bind(SanphamInterface::class, Sanpham::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         // Share $_cart to every view
         view()->composer('header',function($view)
         {
             $loai_sp=ProductType::all();
             if(Session('cart'))
             {
                 $oldCart=Session::get('cart');
                 $cart=new Cart($oldCart);
             }
             $view->with(['loai_sp',$loai_sp,'cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
         }
     );
 

         //  view()->composer('*', function ($view) {
         //     view()->share('_cart', \Session::get('cart'));
         // });
    }
   
}
