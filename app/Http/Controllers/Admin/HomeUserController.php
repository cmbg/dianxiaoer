<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\HomeUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class HomeUserController extends Controller
{
     /**
     * 图片上传处理(头像)
     * @param  Request $request [description]
     * @return [type]           [description]
     */
     public function upload(Request $request)
        {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
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
     * 前台用户管理的首页  包括多条件查询(条件为用户名,电话,是普通用户还是鱼塘塘主)  分页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $user = HomeUser::orderBy('uid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('keywords1');
                $tel = $request->input('keywords2');
                $identity = $request->input('identity');
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                if(!empty($tel)) {
                    $query->where('tel','like','%'.$tel.'%');
                }
                if(!empty($identity) && ($identity == '鱼塘塘主')) {
                    $query->where('identity','like','%'.'2'.'%');
                }
                 if(!empty($identity) && ($identity == '普通用户')){
                    $query->where('identity','like','%'.'1'.'%');
                }
            })
            ->paginate($request->input('num', 5));
        return view('Admin/Home_Users/index',['title'=>'前台用户列表页','user'=>$user, 'request'=> $request]);
    }

    /**
     * 点击首页的添加用户,跳转至添加前台用户页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Home_Users.add',['title'=>'前台用户添加页']);
    }
    

    /**
     * 在添加前台用户页面添加完数据后,将表单提交至这个方法,进行表单验证,执行保存数据库操作,并判断是否成功
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = Input::except('_token');

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
        //如果表单验证失败 
        if ($validator->fails()) {
            return redirect('admin/homeuser/create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new HomeUser();
         $user->uname = $input['uname'];
         $user->password = Hash::make($input['password']);
         $user->email = $input['email'];
         $user->tel = $input['tel'];
         $user->sex = $input['sex'];
         $res = $user->save();
        //   4. 判断是否添加成功
        if($res){
            return redirect('admin/homeuser')->with('msg','添加成功');
        }else{
            return redirect('admin/homeuser/create')->with('msg','添加失败');
        }
    }

    /**
     * 点击前台用户管理首页的详细时跳转到这个方法,查找对应用户的详细信息,可进行身份,状态修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        $user = HomeUser::find($uid);
        return view('Admin/Home_Users/info',compact('user'),['title'=>'前台用户详情页']);
    }

    /**
     * 点击前台用户管理首页的修改时跳转到这个方法,将需要修改用户的数据提交至表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $user = HomeUser::find($uid);
//        2.返回修改页面（带上要修改的用户记录）
        return view('Admin/Home_Users/edit',compact('user'),['title'=>'前台用户修改页']);
    }

    /**
     * 对提交来的数据进行表单验证,通过后更新数据库,返回视图是否成功
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $input = Input::except('_token');
         //   1. 通过id找到要修改那个用户
        $user = HomeUser::find($uid);
         //    2. 通过$request获取要修改的值
       $input = $request->except('_token','_method','file_upload');
        //    3. 使用模型的update进行更新
        $res = $user->update($input);
        //    4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/homeuser');
        }else{
            return redirect('admin/homeuser/'.$user->uid.'/edit');
        }
    }

    /**
     * 点击后台用户管理的删除,删除对应的用户信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        $res = HomeUser::find($uid)->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }
        return $data;
    }
}
