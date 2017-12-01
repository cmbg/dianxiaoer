<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\HomeUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return "1111";
         $user = HomeUser::orderBy('uid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('keywords1');
                $tel = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                if(!empty($tel)) {
                    $query->where('tel','like','%'.$tel.'%');
                }
            })
            ->paginate($request->input('num', 4));
        return view('Admin/Home_Users/index',['title'=>'前台用户列表页','user'=>$user, 'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Home_Users.add',['title'=>'前台用户添加页']);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $input = Input::except('_token');

          $user = new HomeUser();
         $user->uname = $input['uname'];
         $user->password = Crypt::encrypt($input['password']);
         $user->email = $input['email'];
         $user->tel = $input['tel'];
         $user->sex = $input['sex'];
         // $user->avatar = $input['avatar'];
         $res = $user->save();
//        4. 判断是否添加成功
        if($res){
            return redirect('admin/homeuser')->with('msg','添加成功');
        }else{
            return redirect('admin/homeuser/create')->with('msg','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        //
        $user = HomeUser::find($uid);

        return view('Admin/Home_Users/info',compact('user'),['title'=>'前台用户详情页']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        //
        $user = HomeUser::find($uid);

//        2.返回修改页面（带上要修改的用户记录）
        return view('Admin/Home_Users/edit',compact('user'),['title'=>'前台用户修改页']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //
        $input = Input::except('_token');
         //        1. 通过id找到要修改那个用户
        $user = HomeUser::find($uid);

//        2. 通过$request获取要修改的值

       $input = $request->except('_token','_method');
        // $input = $request->only('uname','tel','sex','email','password');//数组
        //$input = $request->input('user_name');//字符串

        // dd($input);

//        3. 使用模型的update进行更新
//        $user->update(['user_name'=>'zhangsan']);
        $res = $user->update($input);
        // $res = $input->save();
//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/user');
        }else{
            return redirect('admin/user/'.$user->uid.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        //
           $res = HomeUser::find($uid)->delete();
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
