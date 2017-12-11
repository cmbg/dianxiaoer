<?php

namespace App\Http\Controllers\Home;
use App\Http\Models\Address;
use App\Http\Models\Order;
use App\Http\Models\OrderDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends CommonController
{

    /**
     * Display a listing of the resource.
     *显示订单页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::where('isStaAdd','2')->take(1)->get();
//        dd($address);
        return view('Home.Home_order.order',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home/address');
    }

    /**
     * 把生成的订单插入数据库
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
//        dd($order);
        if($res){


            return redirect('/Home/payment')->with('oid',$oid)->with('name',$or['name'])->with('tel', $or['tel'])->with('add',$or['add'])->with('des',$or['order_comments']);

        }


    }

    /**
     * 显示我的订单
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
