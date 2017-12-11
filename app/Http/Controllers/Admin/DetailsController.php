<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\good;
use App\Http\Models\goodsdetail;
use App\Http\Models\gpic;
use App\Services\OSS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {

        $data = good::with('fishpond','gpicinfo', 'gpic')->where('gid',$id)->get(); //get  是一个集合 $a = $input[0]['gname'];
        //first 是一个对象 $a = $input->gname;
        $title = $data[0]->gname . '详情页';//all 是静态
        $data = $data[0];
//        dd($data);
        return view('Admin.Admin_Det.good_details', compact('data', 'title','id'));

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
            if($re){
                return $newName;
                die;
            }


        }else{
            $pic = gpic::create(['gpic' => $newName, 'gid' => $input]);
                if($pic){
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
        $name = good::find($id)->first();
        $title = $name['gname'] . '商品详情页';

//        $data = good::find(3)->gpicinfo;
        return view('Admin.Admin_Det.add_det', compact('id', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $input = $request->except('_token', 'pic', 'file_upload');
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

        $validator = \Validator::make($input, $rule, $mess);//1.数据 2.检验 3,错误信息

        if ($validator->fails()) {
            return redirect('Admin/Det/create/' . $id)
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
        return redirect('/Admin/Goods');
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
        $file = $request->file('image');
        if ($file->isValid()) {
            $ext = $file->getClientOriginalExtension();
            $newName = time() . rand(1000, 9999) . '.' . $ext;
            $res = OSS::upload($newName, $file->getRealPath());
        }
        if ($res) {
            return $newName;
        }
    }

    public function edit(Request $request, $id)
    {
        $data = good::with('fishpond', 'gpicinfo', 'gpic')->where('gid', $id)->get(); //get  是一个集合 $a = $input[0]['gname'];
        $data = $data[0];

//        dd($data->gpicinfo->content);
        $title = $data->gname.'修改商品详情页';
        return view('Admin.Admin_Det.edit_det', compact('data', 'id','title'));

    }

    /**
     * 修改商品详情
     *
     */

    public function update(Request $request)
    {
//
        $id = $request->input('gid');
        $data = $request->except('_token');

        $rule = [

            'scl' => 'required|regex:/[0-9]/',//收藏数量
            'content' => 'required|max:2000|min:50',


        ];
        $mess = [

            'scl.required' => '收藏不能为空',
            'scl.regex' => '清正确输入',
            'content.required' => '请填写商品详情',
            'content.min' => '详情过于简短',
            'content.max' => '详情过于过长'
        ];

        $validator = \Validator::make($data, $rule, $mess);//1.数据 2.检验 3,错误信息

        if ($validator->fails()) {
            return redirect('Admin/')
                ->withErrors($validator)
                ->withInput();

        }

        $res = goodsdetail::find($id)->update($data);
        if ($res) {
            return redirect('Admin/Goods')->with('msg', '修改成功');
        } else {
            return redirect('Admin/Goods')->with('msg', '修改失败');
        }
    }
}
