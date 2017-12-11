<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Cate;
use App\Http\Models\good;
use App\Http\Models\goodsdetail;
use App\Http\Models\gpic;
use App\Services\OSS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DetController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if(!$this -> yz($id)){
            return redirect('home/fshop')->with('msg', '请您正确操作');
        }

        $data = good::with('fishpond', 'gpicinfo', 'gpic')->where('gid', $id)->get(); //get  是一个集合 $a = $input[0]['gname'];
        $data = $data[0];
//        dd($data);
        return view('home.home_Det.good_details', compact('data', 'id'));

    }

    public function uploadpic(Request $request)
    {
        $input = $request->input('gid');
        $flag = $request->input('flag');
        $id = $request->input('id');

        $file = $request->file('image');
        if ($file->isValid()) {
            $ext = $file->getClientOriginalExtension();
            $newName = time() . rand(1000, 9999) . '.' . $ext;
            $res = OSS::upload($newName, $file->getRealPath());
        }
        $newName = 'http://cmbgl.oss-cn-beijing.aliyuncs.com/' . $newName;

        if ($res && $flag == 1) {
            $re = gpic::find($id)->update(['gpic' => $newName, 'gid' => $input]);
            if ($res) {
                return $newName;
                die;
            }


        } else {
            $pic = gpic::create(['gpic' => $newName, 'gid' => $input]);
            if ($pic) {
                return $newName;
            }
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
       $data = good::with('fishpond', 'gpicinfo', 'gpic')->where('gid', $id)->get();
       $data = $data[0];
        if(!$this -> yz($id)){
            return redirect('home/fshop')->with('msg', '请您正确操作');
        }
//        dd($data);
        return view('home.home_Det.add_det', compact('id', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if(!$this -> yz($id)){
            return redirect('home/fshop')->with('msg', '请您正确操作');
        }
        $input = $request->except('_token', 'pic', 'file_upload');
        $rule = [
            'scc' => 'required',
            'scl' => 'required|regex:/[0-9]/',//收藏数量
            'content' => 'required|max:200|min:50',


        ];
        $mess = [
            'scl.required' => '收藏不能为空',
            'scl.regex' => '清正确输入',
            'content.required' => '请填写商品详情',
            'content.min' => '详情过于简短',
            'content.max' => '详情过于过长'
        ];

        $validator = \Validator::make($input, $rule, $mess);//1.数据 2.检验 3,错误信息

        if ($validator->fails()) {
            return redirect('home/Det/create/' . $id)
                ->withErrors($validator)
                ->withInput();

        }
        //把id写入数组
        $input['gid'] = $id;

        //获取图片
        $data = $request->only('pic');


        DB::beginTransaction();//开始事件

        try {
            //删除用户以前拥有的角色
            DB::table('goodsdetail')->insert($input);
//            给当前用户重新授权
            foreach ($data as $v) {
                foreach ($v as $m) {
                    if (!empty($m)) {
                        DB::table('gpics')->insert(['gpic' => $m, 'gid' => $id]);
                    }
                }
            }

        } catch (Exception $e) {
            DB::rollBack(); //回滚
        }

        DB::commit(); //确认事件
        return redirect('/home/fshop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $gid = $request->input('gid');
        $file = $request->file('image');
        if ($file->isValid()) {
            $ext = $file->getClientOriginalExtension();
            $newName = time() . rand(1000, 9999) . '.' . $ext;
            $res = OSS::upload($newName, $file->getRealPath());
        }
//        $newName = 'http://cmbgl.oss-cn-beijing.aliyuncs.com/' . $newName;
        if ($res) {
//            $re = gpic::create(['gid' => $gid, 'gpic' => $newName]);
//            if ($re) {
                return $newName;
//            }
        }
    }

    /**
     * 修改商品展示页面
     *
     */

    public function edit(Request $request, $id)
    {
        if(!$this -> yz($id)){
            return redirect('home/fshop')->with('msg', '请您正确操作');
        }

        $data = good::with('fishpond', 'gpicinfo', 'gpic')->where('gid', $id)->get(); //get  是一个集合 $a = $input[0]['gname'];
        $data = $data[0];
//        dd($data->gpicinfo->content);
        return view('home.home_Det.edit_det', compact('data', 'id'));

    }

    /**
     * 修改商品详情
     *
     */

    public function update(Request $request)
    {
//
        $id = $request-> input('gid');
        $data = $request->except('_token');

        $rule = [
            'scc' => 'required',
            'scl' => 'required|regex:/[0-9]/',//收藏数量
            'content' => 'required|max:200|min:50',


        ];
        $mess = [
            'scc.required' => '不能为空',
            'scl.required' => '收藏不能为空',
            'scl.regex' => '清正确输入',
            'content.required' => '请填写商品详情',
            'content.min' => '详情过于简短',
            'content.max' => '详情过于过长'
        ];

        $validator = \Validator::make($data, $rule, $mess);//1.数据 2.检验 3,错误信息

        if ($validator->fails()) {
            return redirect('home/fshop')
                ->withErrors($validator)
                ->withInput();

        }

       $res =  goodsdetail::find($id)->update($data);
        if($res){
            return redirect('home/fshop')->whih('msg','修改成功');
        }else{
            return  redirect('home/fshop')->whih('msg','修改失败');
        }
    }

    /**
     * @判断商品是不是属于 用户
     * @ return true 和false 用于其他方法掉调用
     */
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
