<?php

namespace App\Http\Controllers\Home;
use App\Http\Models\Order;
use App\Http\Models\OrderDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *显示订单页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //购物车所有信息
        $carts = Cart::content();
        //总额 不含税
        $total = Cart::subtotal();
        //购物车商品数量
        $count = Cart::count();
        return view('Home.Home_order.order',compact('count','carts','total'));
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
        $oid = time().uniqid();
        $or = $request->except('_token');
        $ord =$request->session()->get('cart');
        $number = 0;
        $oprice= 0;

        foreach($ord as $v)
        {
            foreach($v as $m)
            {
                $number += $m->qty;
                $oprice += $m->price;
                $orderdetial = new OrderDetail();
                $orderdetial->oid = $oid;
                $orderdetial->gid = $m->id;
                $orderdetial->bcnt = $m->qty;
                $orderdetial->bprice = $m->price;
                $res = $orderdetial->save();
                if(!$res){
                    return redirect('/cart');
                }
            }
        }

        $order = new Order();
        $order->oid = $oid;
//        $order->uid = $or['uid'];
        $order->add = $or['add'];
        $order->tel = $or['tel'];
        $order->name = $or['name'];
        $order->pay = $or['payment_method'];
        $order->des = $or['order_comments'];
        $order->number = $number;
        $order->oprice = $oprice;
        $order->ontime =  date('y-m-d h:i:s',time());
        $res = $order->save();
//        dd($res);
        if($res){
            return redirect('/Home/payment');

        }


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}