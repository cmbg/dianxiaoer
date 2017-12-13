<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Links;
use App\Http\Models\Nav;
use Cart;
use App\Http\Models\Cate;

class CommonController extends Controller
{
    public function __construct()
    {
        $data = Cate::tree();
//        dd($data);
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
        view()->share('data', $data);
    }

}
