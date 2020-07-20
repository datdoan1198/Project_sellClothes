<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use App\Model\Product;
use App\Model\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        view()->composer('fondend.layout.navbar', function($view){
            $categories = Category::all();
            $data = new Category();
            $categories_parents = $data->showCategory($categories);
            $view->with('categories_parents',$categories_parents);
        });

        view()->composer('fondend.layout.header',function($view){
            $mini_cart = Cart::content();
            $img_product = Product::all();
            $view->with('mini_cart',$mini_cart);

        });
        view()->composer('fondend.layout.header',function($view){
            
            $img_product = Product::all();
            $view->with('img_product',$img_product);

        });
       
        // \Illuminate\Support\Facades\view::share('fondend.layout.navbar', $categories_parents);   
    }
}
