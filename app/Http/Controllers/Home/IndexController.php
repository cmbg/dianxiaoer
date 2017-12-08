<?php

namespace App\Http\Controllers\Home;


use App\Http\Models\Ad;
use App\Http\Models\Links;
use App\Http\Models\Cate;
use Illuminate\Http\Request;
use App\Http\Models\Nav;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = Ad::where('posit','1')->where('astatus','0')->take(3)->get();//轮播图
        $data2 = Ad::where('posit','2')->where('astatus','0')->take(2)->get();//下面广告位
        $data3 = Ad::where('posit','3')->where('astatus','0')->take(1)->get();//右一
        $data4 = Ad::where('posit','4')->where('astatus','0')->take(1)->get();//右二
        $cates = Cate::get();
        //购物车所有信息
        $carts = Cart::content();
        //总额 不含税
        $total = Cart::subtotal();
        //购物车商品数量
        $count = Cart::count();
         $arr = [];
        foreach ($cates as $k => $v) {
            //如果是当前遍历的类是一级类
            if ($v->cate_pid == 0) {
                $arr[] = $v;
                //找当前一级类下的二级类
                foreach ($cates as $m => $n) {
                    //如果一个分类的pid == $v这个类的id,那这个类就是$v的子类
                    if ($n->cate_pid == $v->cate_id) {
                        $brr[$v->cate_id][] = $n;
                    }
                }
            }
        }
        
        return view('Home.Index.index',compact('data1','data2','data3','data4','arr','brr','count','carts','total'));
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
