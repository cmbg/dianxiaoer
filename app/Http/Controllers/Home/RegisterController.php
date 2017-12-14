<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\HomeUser;
use Illuminate\Http\Request;
use App\Jobs\SendReminderEmail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\SMS\SendTemplateSMS;
use App\SMS\M3Result;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

//    演示队列发送邮件
    /**
     * 发送提醒的 e-mail 给指定用户。
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendReminderEmail()
    {

        $user = HomeUser::findOrFail(15);
        $this->dispatch(new SendReminderEmail($user));
    }




    /**
     * 手机注册页面
     */
    public function PhoneRegister()
    {
        return view('Home/Home_Login/register');
    }

    /**
     * 发送短信验证码的方法
     */
    public function sendCode(Request $request)
    {
        $input = $request->except('_token');
        // return $input;

        $tempSms = new SendTemplateSMS();

//    * @param to 手机号码集合,用英文逗号分开
//    * @param datas 内容数据 格式为数组 第一个元素是一个随机数，表示验证码；第二个参数是验证码的有效时间 如5分钟
//    * @param $tempId 模板Id

//        参数1 手机号
        $phone = $input['phone'];

//        参数2
        $r = mt_rand(1000,9999);
        $arr = [$r,5];

        $M3Result = new M3Result();
        $M3Result = $tempSms->sendTemplateSMS($phone,$arr,1);
        //发送验证码成功后，将验证码存入session中
        // session('phone',$r);
        \Session::put('phone',$r);
        // dd(session('phone'));
        return $M3Result->toJson();
    }
    
    
    /**
     * 实现手机号注册功能
     */
    public function doPhoneRegister(Request $request)
    {
//        1. 获取用户提交的数据
        $input = $request->except("_token");
         // \Session::put('phone',11111);
        // dd($input);
//        2 表单验证
        $rule = [
            'tel'=>'required|unique:home_users,tel',
            "password"=>'required|between:6,20',
            're_password' => 'same:password',
            'code' => 'required'
        ];
        $message = [
            'tel.required'=>'请正确输入手机号',
            'tel.unique' => '手机号已被注册',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在6到20位之间',
            're_password.same'=>'两次密码输入不一致',
            'code.required' =>'必须输入验证码' 
        ];
        $validators =  Validator::make($input,$rule,$message);
        // dd($validators->withErrors);
        if ($validators->fails()) {
            return redirect('errorphone')
                ->withErrors($validators)
                ->withInput()->with('id',1);
 // dd(session('errors'));
        }
//        3 验证验证码
       if($input['code'] != session('phone')){
       	// dd(1111);
           return redirect('errorphone')->with('errors','验证码错误');
       }

//        4 向用户表添加注册用户
       $arr['tel'] = $input['tel'];
        $arr['password'] = Hash::make($input['password']);
        $arr['is_active'] = 1;
//        给token字段赋值
        $arr['token'] = $input['password'];


        // dd($input);
        $res = HomeUser::create($arr);
        // dd($res);
        if($res){
            return redirect('home/login');
        }else{
            return back();
        }

    }


    /**
     * 邮箱注册页面
     */
    public function EmailRegister()
    {
        return view('Home/Home_Login/register');
    }

    /**
     * 邮箱注册
     */
    public function doEmailRegister(Request $request)
    {

        // return 11111;
//        1 . 接受客户端传过来的注册数据
         $input = $request->except('_token');
//        2. 表单验证
         // dd($input);
        $rule = [
            'email'=>'required|email|unique:home_users,email',
            "password"=>'required|between:6,20',
            're_password' => 'same:password',
        ];
        $mess = [
            'email.required'=>'必须输入邮箱',
            'email.email' => '邮箱格式不正确',
            'email.unique' => '此邮箱已被注册',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在6到20位之间',
            're_password.same'=>'两次密码输入不一致'
        ];
        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
            return redirect('phoneregister')
                ->withErrors($validator)
                ->withInput();
        }
        // 3. 向用户表中添加注册记录
        $arr['email'] = $input['email'];

        $arr['password'] = Hash::make($input['password']) ;

        $arr['is_active'] = 0;
        $arr['token'] = $arr['password'];
        //添加成功后，返回刚才添加的那条用户记录
       $res =  HomeUser::create($arr);
       //dd($res);
       if($res){

           //        4. 给注册邮箱发送注册邮件

//        参数一： 对方收到的邮件模板
//        参数二：邮件模板中需要的变量
//        参数三：关于邮件注册的变量，如发件人，主题、收件人等信息
           Mail::send('email.active', ['user' => $res], function ($m) use ($res) {
               //$m->from('hello@app.com', 'Your Application');

               $m->to($res->email)->subject('注册邮箱激活!');
           });
				// sleep(5);
           return redirect('/phoneregister')->with('errors','请激活邮箱');


       }else{
           return back();
       }

    }

    public function  errorphone()
    {
        return view('Home/Home_Login/errorphone');
    }

    /**
     * 邮箱激活方法
     */

    public function active(Request $request)
    {
//        就是找到要激活的用户，将这条记录的is_active字段的值改成1


//        1. 先找到要激活的用户

        $user = HomeUser::find($request['uid']);

//        1. 验证激活链接的有效性
        if($request['key'] != $user->token){
            return "无效的激活链接";
        }

        $res = $user->update(['is_active'=>1]);

        if($res){
            return redirect('home/login');
        }else{
            return "激活失败，请重新注册";
        }
        
    }

    //找回密码的页面
    public function forget()
    {
        return view('Home/Home_Login/forget');
    }

//    发送找回密码的邮件
    public function doforget(Request $request)
    {
          $input = $request->except('_token');
        //要发送的邮箱
        $email = $request['email'];
        // dd($email);
//        根据邮箱获取收件人信息
        $rule = [
            'email'=>'required',
            
        ];
        $mess = [
            'email.required'=>'必须输入注册邮箱',
        ];
        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
            return redirect('forget')
                ->withErrors($validator)
                ->withInput();
        }

        $res = HomeUser::where('email',$email)->first();

        // dd($res);
        Mail::send('email.forget', ['user' => $res], function ($m) use ($res) {
            //$m->from('hello@app.com', 'Your Application');

            $m->to($res->email, $res->uname)->subject('用户密码找回!');
        });
        sleep(5000);
        return redirect('/forget');

    }


    //重置密码页面
    public function reset(Request $request)
    {
        //根据uid获取要修改密码的用户，根据key确定链接的有效性

        $user = HomeUser::find($request['uid']);

        $uname = $user->uname;

        if($request['key'] != $user->token){
            return '无效的连接';
        }


        //如果有效，就返回修改密码的界面
        return view('Home/Home_Login/reset',compact('uname'));
    }
    
    
    
    //重置密码
    public function doreset(Request $request)
    {
    	// dd($request['email']);
//        1.找到要重置密码的用户
       $user = HomeUser::where('email',$request['email'])->first();
       // dd($user);
//        2.将用户的密码修改为传过来的密码

        $pass = Hash::make($request['password']);

        $res = $user->update(['password'=>$pass]);

        if($res){
            return redirect('home/login');
        }else{
            return "密码修改失败，请重新修改";
        }
        
    }



}
