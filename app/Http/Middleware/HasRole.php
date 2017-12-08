<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\AdminUser;
class HasRole
{
    /**
     * 判断后台登录者是不是有权限
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //如果当前用户有正在执行的路由有权限就放行，没有就给一个没有权限的提示
//        1.获取当前用户执行执行的操作对应的路由对应的控制器的方法
        //当前正在执行的路由对应的控制器的方法名
//        "App\Http\Controllers\Admin\UserController@index"
//        $route = \Route::current()->getActionName();
//        return $route;

//        2.获取当前用户所拥有的权限
//        获取当前用户的ID
//        $uid = session('user')->user_id;
//        //找到
//        $user = User::find($uid);

//        2.1 获取当前用户拥有的角色
//        $roles = $user->role;
//        dd($roles);

//        定义一个数组，存放用户拥有的所有权限
//        $arr = [];
//        2.2 根据拥有的角色获取权限
//        foreach ($roles as $k => $v) {
//            //根据角色找到相关的权限的数组
//            foreach ($v->permission as $m => $n) {
//                $arr[] = $n->description;
//            }
//        }


//        去除权限中重复的记录
//        $arr = array_unique($arr);


//        2.3 判断当前路由对应的控制器的方法是否在用户拥有的权限中
//        当前用户拥有的权限
//        array:3 [▼
//                  0 => "App\Http\Controllers\Admin\UserController@create "
//                  1 => "App\Http\Controllers\Admin\IndexController@index "
//                  4 => "App\Http\Controllers\Admin\UserController@index "
//                ]


//        当前请求的路由对应的控制器的方法
        //        "App\Http\Controllers\Admin\UserController@index"

//        "App\Http\Controllers\Admin\IndexController@index"
//        dd($route);

//        dd($arr);
//        如果当前路由对应的控制器的方法在用户拥有的权限中，放行；如果不在就提示没有权限
//        if (in_array($route, $arr)) {
//            return $next($request);
//        } else {
//            return redirect('errors/auth');
//        }


//        return $next($request);



        //获取当前的控制器方法
        $aa = \Route::currentRouteAction();
//        获当前的路由
        $role = strstr($aa,'@',-1);
//        return $aa;
//        return $role;
        //获取后台角色ID
        \Session::put('user',['uid'=>1,'uname'=>'张三']);
        $id = \Session::get('user')['uid'];
//        $id = \Session::get('user')->uid;
//        $id = session()->get('user')->uid;
//        dd($id);
        $data = AdminUser::find($id)->identity;
        dd($data);
        //获取角色权限
        $arr = [];
        foreach($data as $k=>$v){

            foreach($v->auth as $kk=>$vv){
                $arr[] = $vv->adesc;
            }
        }
        //去除重复值哦
        $arr = array_unique($arr);

        //判断当前访问的模块在不在所属权限中
        if(in_array($role,$arr)){
            return $next($request);
        }else{
            return redirect('admin/error/auth');
        }

    }
}
