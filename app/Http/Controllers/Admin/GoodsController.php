<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Cate;
use App\Http\Models\good;
use App\Http\Models\gpic;
use App\Http\Models\goodsdetail;
use App\Services\OSS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 返回 所有商品信息, 分页request 和分类信息
     */
    public function index(Request $request)
    {
        $gname = $request->input('gname');
        $type = $request->input('type');
        $a = $type ? '=' : '>';
        //查询数据库 获取
        $data = good::where('fid',$a,0)->with('Cate')
            ->where('gname', 'like', '%' . $gname . '%')
            ->paginate($request->input('num'));
        $title = '商品列表页';
//        $data = $data[0];
//        dd($data);
        return view('Admin.Admin_Goods.admin_goods', compact( 'title', 'request', 'data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Cate::tree();
//        dd($data);
        return view('Admin.Admin_Goods.add_goods', ['title' => '商品添加页', 'data' => $data]);
    }

    /**
     * @param 图片上传
     * @return  返回图片路径
     */

    public function upload(Request $request)
    {

        //图片上传
        $file = $request->file('file_upload');
        if ($file->isvalid()) {
            $ext = $file->getClientOriginalExtension();
            $newName = time() . rand(1000, 9999) . '.' . $ext;
            $res = OSS::upload($newName, $file->getRealPath());
        }
        if ($res) {
            return $newName;
        }

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
            return redirect('Admin/Goods/create')
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


        //good::
    }

    /**
     * 显示 商品的详情
     *
     * 商品的$id
     * 显示出详情信息 和页面
     */
    public function show(Request $request, $id)
    {
//        //
//        $id = $request->input('id');
//
//        $data = good::find($id)->gpicinfo;
//        dd($data->g);
    }

    /**
     *
     * 需要更改的$id
     * @返回要更改的信息
     */
    public function edit($id)
    {
        $data = good::find($id);
        $tree = Cate::Tree();

        $title = '这是修改页面';
        return view('Admin.Admin_Goods.edit_goods', compact('data', 'title','tree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

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

    public function update(Request $request, $id)
    {

        $data = Input::except('_token');
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

        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('Admin/Goods/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $res = good::find($id)->update($data);
        if ($res) {
            return redirect('Admin/Goods')->with('eidtmsg', '修改成功');
        } else {
            return redirect('Admin/Goods/' . $id . 'edit')->with('editmsg', '修改失败');
        }


    }

    /**
     * Remove
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = good::find($id)->delete();
        $re = goodsdetail::where('gid',$id) ->delete();
        $r = gpic::where('gid', $id)->delete();
        $data = [];
        if ($res && $re && $r ) {
            $data['error'] = 0;
            $data['msg'] = '删除成功';
        } else {
            $data['error'] = 1;
            $data['msg'] = '删除失败';
        }


        return $data;
    }
}
