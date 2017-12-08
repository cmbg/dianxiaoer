<?php

namespace App\Providers;

use App\Http\Models\Links;
use App\Http\Models\Nav;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $links = Links::get();//友情链接
        $nav = Nav::orderBy('paixu','asc')->get();//导航栏
        view()->share('links', $links);
        view()->share('nav', $nav);
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
