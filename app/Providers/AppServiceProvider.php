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
