<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Cate;
use App\Http\Models\good;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('Home.Home_Fshop.List');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if(Session::get('user')['identity']) == 2 ){
//        return back();

        $title='鱼塘商品添加页';
        $data = Cate::tree();
        return view('Home.Home_Fshop.Create', compact('title','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $rule = [
            'tid' => 'required',
            'gname' => 'required',
            'price' => 'required|regex:/[0-9]/',
            'goodsDes' => 'required|between:20,200',
            'gstatus' => 'required',
            'pic' => 'required',


        ];
        $mess = [
            'tid.required' => '请选择类别',
            'price.required' => '价格不能为空',
            'price.regex' => '价格你输入有误',
            'gname.required' => '请填写商品名称',
            'goodsDes.required' => '请正确填写简介',
            'goodsDes.between' => '简介过于简短',
            'gstatus.required' => '请选择商品的状态',
            'pic.required' => '不能没有图片啊!!!',
        ];

        $validator = \Validator::make($data, $rule, $mess);//1.数据 2.检验 3,错误信息

        if ($validator->fails()) {
            return redirect('/home/fshop/create')
                ->withErrors($validator)
                ->withInput();

        }
        $good = new good();
        $good->tid = $data['tid'];
        $good->gname = $data['gname'];
        $good->pic = $data['pic'];
        $good->price = $data['price'];
        $good->goodsDes = $data['goodsDes'];
        $good->gstatus = $data['gstatus'];
        $res = $good->save();
        if ($res) {
            return redirect('Admin/Goods')->with('msg', '添加成功');
        } else {
            return redirect('Admin/Goods/create')->with('msg', '添加失败');
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
