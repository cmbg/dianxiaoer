<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\good;
use Illuminate\Http\Request;
use App\Http\Models\goodsdetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;

class ShopController extends CommonController
{
    /*
     * 添加到购物车
     */
    public  function addcart(Request $request,$gid)
    {
        $go = $request->all();
//        dd($go);
//        Cart::add($gid,$go['gname'],$go['cnt'],$go['price']);
        Cart::add($gid,$go['gname'],$go['cnt'],$go['price']);

        return redirect('home/cart');
    }

    /*
     * 购物车列表
     */

    public function cart()
    {
        return view('Home.Home_Product.cart');
    }

    /*
     * 删除购物车里的某一件商品
     */
    public  function  getRemovecart($rowId)
    {
        Cart::remove($rowId);
        return redirect('home/cart');
    }

    /*
     * 清空购物车
     */
    public function destroy()
    {
        Cart::destroy();
        return redirect('home/cart');
    }
}
