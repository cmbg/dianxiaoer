<?php

namespace App\Providers;

use App\Http\Models\Cate;
use App\Http\Models\Links;
use App\Http\Models\Nav;
use Illuminate\Support\ServiceProvider;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $carts = Cart::content();//购物车所有信息
        $total = Cart::subtotal();//总额 不含税
        $count = Cart::count();//购物车商品数量
        $links = Links::get();//友情链接
        $nav = Nav::orderBy('paixu','asc')->get();//导航栏
        view()->share('links', $links);
        view()->share('nav', $nav);
        view()->share('carts', $carts);
        view()->share('total', $total);
        view()->share('count', $count);

        $data = Cate::tree();
        view()->share('data', $data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
