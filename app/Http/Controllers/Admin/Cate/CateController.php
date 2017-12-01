<?php

namespace App\Http\Controllers\Admin\Cate;


use App\Http\Models\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CateController extends Controller
{
    /**
     * 修改排序
     */
    public function changeOrder(Request $request)
    {
//        修改要排序的那条记录的cate_order字段为用户指定的值
        //要修改的那条记录
        $cate_id = $request->input('cate_id');

        //要修改的值
        $cate_order = $request->input('cate_order');

        $cate = Cate::find($cate_id);
        $res = $cate->update(['cate_order'=>$cate_order]);

        if($res){
            $data =[
                'status'=> 0,
                'msg'=>'修改成功'
            ];
        }else{
            $data =[
                'status'=> 1,
                'msg'=>'修改失败'
            ];
        }

        return  $data ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取所有的分类数据，返回到前台列表
//        $cates = Cate::get();


        $cates =  (new Cate)->tree();
//        dd($cates);

        $title = '这是分类页';
        return view('Admin.Cate.list',compact('cates','title'));
    }





    public function create()
    {
        //返回一级类
        $cateOne = Cate::where('cate_pid',0)->get();
        $title = '这是添加页';
        return view('Admin.Cate.add',compact('cateOne','title'));
    }


    public function store(Request $request)
    {
        // 1. 获取用户提交的表单数据

        $input = $request->except('_token');
//        dd($input);
//////        2. 表单验证
////
         $rule = [
             'cate_name'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:2,20',
////
         ];
//////
////
         $mess = [
             'cate_name.required'=>'类名必须输入',
             'cate_name.regex'=>'类名必须汉字字母下划线',
             'cate_name.between'=>'类名必须在2到20位之间',

         ];
//
//////
         $validator = Validator::make($input,$rule,$mess);
         //如果表单验证失败 passes()
         if ($validator->fails()) {
             return redirect('/Admin/Cate/create')
                 ->withErrors($validator)
                 ->withInput();
         }


//        3. 执行添加操作
        $cate = new Cate();
        $cate->cate_name = $input['cate_name'];
        $cate->cate_title = $input['cate_title'];
        $cate->cate_keywords = $input['cate_keywords'];
        $cate->cate_description = $input['cate_description'];
        $cate->cate_order = $input['cate_order'];
        $cate->cate_pid = $input['cate_pid'];

        $res = $cate->save();
//        4. 判断是否添加成功
        if($res){
            return redirect('/Admin/Cate/list')->with('msg','添加成功');
//            return 111;
        }else{
            return redirect('/Admin/Cate/create')->with('msg','添加失败');
//            return 111;
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
        $res = Cate::find($id)->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $data;
    }
}
