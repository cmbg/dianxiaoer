<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Models\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends CommonController
{
    /**
     * 显示角色列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有的角色
//        $roles = Role::get();
        $data = Role::paginate(3);
//        dd($data);
        return view('Admin.Admin_Role.Index', ['title' => '角色管理','data'=>$data]);
    }

    /**
     * 显示添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Admin_Role.Add',['title' => '添加角色']);
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ], ['name.required' => '角色必须填写',
            'description.required' => '角色描述必须填写',
        ]);
//        1.获取提交的数据
        $input = $request->except('_token');
//        2. 执行添加操作
        $res = Role::create($input);
//        3. 如果添加成功跳转到列表页，失败跳转到添加页
        if($res){
            return redirect('admin/role')->with('info','添加成功');
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
     * 显示修改界面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::find($id);
        return view('Admin.Admin_Role.Edit',['title' => '修改角色','data'=>$data]);
    }

    /**
     * 执行修改角色
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
        $res = Role::find($id);
        $r = $res->update($input);
        //3. 如果添加成功跳转到列表页，失败跳转到添加页
        if($r){
            return redirect('admin/role')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
    }

    /**
     * 删除一个角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::find($id);
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

    /**
     * 返回给角色授权的页面
     */

    public function auth($id)
    {
//        return  \Route::current()->getActionName();
        //获取当前角色
        $role = Role::find($id);
        //获取所有的权限
        $permissions = Permission::get();
//        dd($permissions);
//        获取当前角色已经拥有的权限
        $own_permissions = DB::table('role_permission')->where('role_id',$id)->lists('permission_id');
//        dd($own_permissions);
        $title = '添加权限';
        return view('Admin.Admin_Role.Auth',compact('role','permissions','own_permissions','title'));
    }


    /**
     * 处理用户授权操作
     */

    public function doauth(Request $request)
    {
//        1 接收用户提交的所有数据
        $input = $request->except('_token');
//        dd($input);
//        "user_id" => "6"
//          "role_id" => array:2 [▼
//            0 => "1"
//            1 => "2"
//          ]
//        ==========>
//        user_id    role_id
//         6           1
//         6           2
//        array:2 [▼
            //  "role_id" => "1"
            //  "permission_id" => array:1 [▼
            //    0 => "1"
            //  ]
            //]
//        ==========>
//        role_id   permission_id
//         1           1
//
        DB::beginTransaction();

        try{
            //删除角色以前拥有的权限
            DB::table('role_permission')->where('role_id',$input['role_id'])->delete();
//            给当前角色重新授权
//        2. 将授权数据添加到permission_role表中
            if(isset($input['permission_id'])){
                foreach ($input['permission_id'] as $k=>$v){
                    DB::table('role_permission')->insert(['role_id'=>$input['role_id'],'permission_id'=>$v]);
                }
            }
            $info = '授权成功';
        }catch (Exception $e){
            DB::rollBack();
            $info = '授权失败';
        }

        DB::commit();

        //添加成功后，跳转到列表页
        return redirect('admin/role')->with('info',$info);
    }
}
