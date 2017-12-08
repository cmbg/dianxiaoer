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
//            return 111;
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

        $title = '这是分类列表页';
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
             'cate_name'=>'required',
////
         ];
//////
////
         $mess = [
             'cate_name.required'=>'类名必须不能为空',
//             'cate_name.regex'=>'类名必须汉字字母下划线',
//             'cate_name.between'=>'类名必须在2到20位之间',

         ];
//
//////
         $validator = Validator::make($input,$rule,$mess);
         //如果表单验证失败 passes()
         if ($validator->fails()) {
             return redirect('/Admin/Cate/list/create')

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
            return redirect('/Admin/Cate/list/create/')->with('msg','添加失败');
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
    public function edit($cate_id)
    {
        $cate = Cate::find($cate_id);
        $title = "修改页面";
//        2.返回修改页面（带上要修改的用户记录）
        return view('Admin.Cate.edit',compact('cate','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cate_id)
    {
//        1. 通过id找到要修改那个用户
        $cate = Cate::find($cate_id);

//        2. 通过$request获取要修改的值
        $input = $request->only('cate_name','cate_keywords');//数组

//    3. 使用模型的update进行更新
        $res = $cate->update($input);
//
//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('/Admin/Cate/list/');
//            return 111;
        }else{
            return redirect('Admin/Cate/list/'.$cate->cate_id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cate_id)
    {
        $data = [];
        $cate = Cate::find($cate_id);
//        是否有二级类
        $count =  Cate::where('cate_pid',$cate_id)->count();
       if($cate->cate_pid == 0 && $count){
           $data = [
                'error'=>0,
               'msg'=>'一级分类不允许删除'
          ];
           return $data;
       } else{
           $res = Cate::find($cate_id)->delete();
       }

        if($res){
            $data['error'] = 1;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 0;
            $data['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $data;
    }
}
