<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = [
            1=>['id'=>1,'name'=>'风景1','price'=>9.9,'des'=>'好风光'],
            2=>['id'=>2,'name'=>'风景2','price'=>19.9,'des'=>'江山如画'],
            3=>['id'=>3,'name'=>'风景3','price'=>29.9,'des'=>'大好河山'],

        ];
//        dd($products);
        return view ('Home.Home_Product.product',['products'=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $d)
    {

    }

    /*
     * 添加到购物车
     */
    public  function addcart($id)
    {


//       Porduct::find($id)
//        找到要购买的商品，添加到购物车
        $products = [
            1=>['id'=>1,'name'=>'风景1','price'=>9.9,'des'=>'好风光'],
            2=>['id'=>2,'name'=>'风景2','price'=>19.9,'des'=>'江山如画'],
            3=>['id'=>3,'name'=>'风景3','price'=>29.9,'des'=>'大好河山'],
        ];
        $product = $products[$id];
        //id  name  qty  price opt
        //将要购买的商品添加到购物车
        Cart::add($product['id'],$product['name'],1,$product['price']);
        return redirect()->route('cart');
    }

    /*
     * 购物车列表
     */

    public function cart()
    {
//        session(['user'=>1]);
        //购物车所有信息
        $carts = Cart::content();
        //总额 不含税
        $total = Cart::subtotal();
        //购物车商品数量
        $count = Cart::count();

        return view('Home.Home_Product.cart',['carts'=>$carts,'total'=>$total,'count'=>$count]);
    }

    /*
     * 删除购物车里的某一件商品
     */
    public  function  getRemovecart($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart');
    }


    /*
     * 清空购物车
     */
    public function destroy()
    {

        Cart::destroy();
        return redirect()->route('cart');
    }
}
