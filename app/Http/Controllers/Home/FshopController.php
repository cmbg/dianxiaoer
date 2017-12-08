<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FshopController extends Controller
{
    /**
     * 塘主查看鱼塘列表内的商品页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home.Home_Fshop.List', ['title' => '商品显示']);
    }

    /**
     * 塘主显示鱼塘内的商品添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.Home_Fshop.Create');
    }

    /**
     * 塘主执行鱼塘的商品添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return '执行添加操作,完毕之后跳转到列表显示页面';

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
