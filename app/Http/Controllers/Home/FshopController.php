<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Cate;
use App\Http\Models\good;
use App\Services\OSS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class FshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $gname = $request->input('gname');
        $user = Session::get('user');
        $uid = $user->uid;
        //查询数据库 获取
        //======================================================
        $data = good::where('uid', $uid)->with('Cate', 'gpicinfo', 'fishpond')
            ->where('gname', 'like', '%' . $gname . '%')
            ->paginate($request->input('num'));
        $title = '商品列表页';
        //========================================================
//        dd($data);
        return view('Home.Home_Fshop.List', compact('title', 'request', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '鱼塘商品添加页';
        $data = Cate::tree();
        return view('Home.Home_Fshop.Create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Session::get('user');
        $data = $request->except('_token', 'file_upload', 'save_account_details');

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
        $data['uid'] = $user->uid;
        $res = good::create($data);
        $gid = $res -> gid;
        if ($res) {
            return redirect('/home/Det/create' . '/'.$gid  )->with('msg', '添加成功');
        } else {
            return redirect('home/fshop/create')->with('msg', '添加失败');
        }


    }

    /**
     * @param 通过ajax传来图片的信息
     * @return 小店 商品图片路径
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
        if(!$this -> yz($id)){
          return redirect('home/fshop')->with('msg', '请您正确操作');
        }

        $data = good::find($id);
        $tree = Cate::Tree();

        $title = '这是修改页面';
        return view('Home.Home_Fshop.Edit', compact('data', 'title', 'tree'));
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
        $data = Input::except('_token', 'file_upload', 'save_account_details');
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
            return redirect('home/fshop/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $res = good::find($id)->update($data);
        if ($res) {
            return redirect('home/fshop')->with('eidtmsg', '修改成功');
        } else {
            return redirect('home/fshop/' . $id . 'edit')->with('editmsg', '修改失败');
        }
    }

    /**
     * 通过ajax 点击实现修改状态
     *需要的参数有 商品gid
     *
     * 相应出 当当时的状态
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(!$this -> yz($id)){
            return redirect('home/fshop')->with('msg', '请您正确操作');
        }

        $res = good::find($id)->delete();
        $re = goodsdetail::where('gid', $id)->delete();
        $r = gpic::where('gid', $id)->delete();
        $data = [];
        if ($res && $re && $r) {
            $data['error'] = 0;
            $data['msg'] = '删除成功';
        } else {
            $data['error'] = 1;
            $data['msg'] = '删除失败';
        }


        return $data;
    }

    public function yz($gid)
    {
        $uid = Session::get('user')->uid;
        $good = good::where('uid', $uid)->get();
        $guid = [];
        foreach ($good as $k => $v) {
            $guid[] = $v->gid;
        }
        if(in_array($gid, $guid)){
            return true;
        } else{
            return false;
        }

    }
}
