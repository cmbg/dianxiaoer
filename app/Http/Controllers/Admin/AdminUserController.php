<?php
namespace App\Http\Controllers\Admin;

use App\Http\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\OSS;
class AdminUserController extends Controller
{

      public function upload(Request $request)
        {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
//        $file = $file[0];
//        $file = $request->all();

//        $file = $request->all();
        // return ($file);  //F:\xampp\tmp\phpF443.tmp
        if($file->isValid()){
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();
            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;
            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';
            //将文件移动到本地服务器的指定的位置，并以新文件名命名
//            $file->move(移动到的目录, 新文件名);
            $file->move($dirpath, $newfile);
            //将文件移动到七牛云，并以新文件名命名
            //\Storage::disk('qiniu')->writeStream('uploads/'.$newfile, fopen($file->getRealPath(), 'r'));
            //将文件移动到阿里OSS
//            OSS::upload($newfile,$file->getRealPath());

            //将上传的图片名称返回到前台，目的是前台显示图片
            return $newfile;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // return "1111";
        $user = AdminUser::orderBy('uid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('keywords1');
                $tel = $request->input('keywords2');
                  $identity = $request->input('identity');
                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                if(!empty($tel)) {
                    $query->where('tel','like','%'.$tel.'%');
                }
                if(!empty($identity) && ($identity == '超级管理员')) {
                    $query->where('identity','like','%'.'1'.'%');
                }
                 if(!empty($identity) && ($identity == '普通管理员')){
                    $query->where('identity','like','%'.'0'.'%');
                }
            })
            ->paginate($request->input('num', 4));
        return view('Admin.Admin_Users.index',['title'=>'后台用户列表页','user'=>$user, 'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Admin_Users.add',['title'=>'用户添加页']);
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
        $input = Input::except('_token','file_upload');
          // 2. 表单验证
        $rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:2,20',
            "password"=>'required|between:6,20',
            'sex'   =>'required',
            're_password' => 'same:password',
            'email'       => 'required|email',
            'tel'       => 'required|size:11'
        ];

        $mess = [
            'uname.required'=>'用户名必须输入',
            'uname.regex'=>'用户名必须汉字字母下划线',
            'uname.between'=>'用户名必须在2到20位之间',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码必须在6到20位之间',
            're_password.same'=>'两次密码输入不一致',
            'email.email' => '不是正确的邮箱格式',
            'email.required' => 'email必须输入',
            'tel.required' => '电话号必须输入',
            'tel.size' =>'电话号长度不对',
            'sex.required' => '必须选择一个性别'

        ];

        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/adminuser/create')
                ->withErrors($validator)
                ->withInput();
        }


//        3. 执行添加操作
         $user = new AdminUser();
         $user->uname = $input['uname'];
         // die ($input['password']);
         $user->password = Hash::make($input['password']);
         // die($user->password);
         $user->email = $input['email'];
         $user->tel = $input['tel'];
         $user->sex = $input['sex'];
         $user->avatar = $input['art_thumb'];
         $res = $user->save();
//        4. 判断是否添加成功
        if($res){
            return redirect('admin/adminuser')->with('msg','添加成功');
        }else{
            return redirect('admin/adminuser/create')->with('msg','添加失败');
        }
    }

        // return ($input);
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        //
        // return "11111";
        $user = AdminUser::find($uid);

        return view('Admin/Admin_Users/info',compact('user'),['title'=>'用户详情页']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
//        1. 根据传过来的ID获取要修改的用户记录
        $user = AdminUser::find($uid);
        // dd($user->sex);
//        2.返回修改页面（带上要修改的用户记录）
        return view('Admin/Admin_Users/edit',compact('user'),['title'=>'用户修改页']);
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
             
        $input = Input::except('_token');
          // 表单验证
        $rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:2,20',
            "password"=>'between:6,20',
            'sex'   =>'required',
            'email'       => 'required|email',
            'tel'       => 'required|size:11'
        ];

        $mess = [
            'uname.required'=>'用户名必须输入',
            'uname.regex'=>'用户名必须汉字字母下划线',
            'uname.between'=>'用户名必须在2到20位之间',
            'email.email' => '不是正确的邮箱格式',
            'email.required' => 'email必须输入',
            'tel.required' => '电话号必须输入',
            'tel.size' =>'电话号长度不对',
            'sex.required' => '必须选择一个性别'

        ];

        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/adminuser/'.$uid.'/edit')
                ->withErrors($validator)
                ->withInput();
        }



        //        1. 通过id找到要修改那个用户
        $user = AdminUser::find($uid);

//        2. 通过$request获取要修改的值

       $input = $request->except('_token','_method','file_upload');
        // $input = $request->only('uname','tel','sex','email','password');//数组
        //$input = $request->input('user_name');//字符串

        // dd($input);

//        3. 使用模型的update进行更新
//        $user->update(['user_name'=>'zhangsan']);
        $res = $user->update($input);
        // $res = $input->save();
//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/adminuser');
        }else{
            return redirect('admin/adminuser/'.$user->uid.'/edit');
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
         $res = AdminUser::find($uid)->delete();
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
