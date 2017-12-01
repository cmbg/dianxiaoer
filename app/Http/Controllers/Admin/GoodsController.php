<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\good;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查询数据库
        $goods = good::orderBy('gid', 'asc')->where(function ($query) use ($request) {
            $gname = $request->input('gname');
            if (!empty($gname)) {
                $query->where('gname', 'like', '%'.$gname.'%');
            }
        })->paginate($request->input('num'));


        $title = '商品列表页';
        return view('Admin.Admin_Goods.admin_goods', compact('goods', 'title', 'request'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.Admin_Goods.add_goods', ['title' => '商品添加页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if ($request->hasFile('pic')) {
            $price = $request->file('pic');
            if ($price->isValid()) {
                $ext = $price->getClientOriginalExtension();
                $priceName = time() . rand(1000, 999) . '.' . $ext;
                $price->move('./upload', $priceName);
            }
        }
        $rule = [
            'tid' => 'required',
            'gname' => 'required',
            'goodsDes' => 'required|between:20,200',
            'gstatus' => 'required',
            'price' => 'image'

        ];
        $mess = [
            'tid.required' => '请选择类别',
            'gname.required' => '请填写商品名称',
            'goodsDes.required' => '请正确填写简介',
            'goodsDes.between' => '简介过于简短',
            'gstatus.required' => '请选择商品的状态',
            'price.image' => '请正确的添加图片'
        ];

        $validator = \Validator::make($data, $rule, $mess);//1.数据 2.检验 3,错误信息

        if ($validator->fails()) {
            return redirect('Admin/Goods/create')
                ->withErrors($validator)
                ->withInput();
        }

        $good = new good();
        $good->tid = $data['tid'];
        $good->gname = $data['gname'];
        $good->goodsDes = $data['goodsDes'];
        $good->gstatus = $data['gstatus'];
        $good->price = $priceName;
        $res = $good->save();
        dd($res);


        //good::
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function ajax(Request $request)
    {
        $gid = $request->input('gid');
        $gstatus = $request->input('gstatus');

        $sta = good::find($gid);
        $res = $sta->update(['gstatus' => $gstatus]);
        if ($res) {
            if ($gstatus == 1) {
                $err = [
                    'err' => 1,
                    'msg' => '已成功上架'
                ];
            } elseif ($gstatus == 2) {
                $err = [
                    'err' => 2,
                    'msg' => '已成功下架'
                ];
            }


        } else {
            $err = [
                'err' => 3,
                'msg' => '已成功下架'
            ];
        }
        return $err;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
