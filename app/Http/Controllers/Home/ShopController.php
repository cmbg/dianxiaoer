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
        $good = good::where('gid',$gid)->first();
        $pic = $good->pic;
        $a = Cart::add($gid,$go['gname'],$go['cnt'],$go['price'],['pic'=>$pic]);
//        dd($a->options['pic']);
//        dd($a);

        return redirect('home/cart');
    }

    /*
     * 购物车列表
     */

    public function cart()
    {
//        Cart::destroy();
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
