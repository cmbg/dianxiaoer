<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends CommonController
{
    /**
     * 显示权限列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有的权限
        $permissions = Permission::paginate(20);
        return view('Admin.Admin_Permission.Index', ['title' => '权限管理','permissions'=>$permissions]);
    }

    /**
     * 显示添加权限页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Admin_Permission.Add',['title' => '添加权限']);
    }

    /**
     * 执行添加权限
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ], ['name.required' => '权限必须填写',
            'description.required' => '权限描述必须填写',
        ]);
//        1.获取提交的数据
        $input = $request->except('_token');
//        $input = $request->all();
//        dd($input);
//        2. 执行添加操作
        $res = Permission::create($input);
//        3. 如果添加成功跳转到列表页，失败跳转到添加页
        if($res){
            return redirect('admin/permission')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
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
     * 显示修改的页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Permission::find($id);
        return view('Admin.Admin_Permission.Edit',['title' => '修改权限','data'=>$data]);
    }

    /**
     * 执行修改权限
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ], ['name.required' => '角色必须填写',
            'description.required' => '角色描述必须填写',
        ]);
//        1.获取提交的数据
        $input = $request->except('_token','_method');
//        dd($input);
//        2. 执行更新操作
        $res = Permission::find($id);
        $r = $res->update($input);
        //3. 如果添加成功跳转到列表页，失败跳转到添加页
        if($r){
            return redirect('admin/permission')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
    }

    /**
     * 删除一个权限
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Permission::find($id);
        $res = $data->delete();
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
