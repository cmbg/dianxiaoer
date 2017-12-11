<?php

namespace App\Http\Controllers\Home;
use App\Http\Models\HomeUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
require_once app_path().'\Org\code\Code.class.php';
use App\Org\code\Code;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends CommonController
{
    /**
     * 作用：后台登录界面
     * @author : 宋寿强
     * @date:    2017-11-29  10:32
     * @param Request $request 请求对象
     * @return 登录成功返回到后台主页，登录失败返回到登录页
     */

    public function login()
    {
        //
        return view('Home/Home_Login/login');
    }

    public function  dologin(Request $request)
    {
        $input = $request->except('_token');
        
        $str = $input['login'];
       // dd($str);
      if(preg_match_all('/^((13[0-9])|(15[^4,\\D])|(18[0,0-9])|(17[0,0-9]))\\d{8}$/', $str, $phone)){
          if(!empty($phone)){
        $rule = [
            'login'=>'required',
            "password"=>'required|between:6,20'
        ];
        $mess = [
            'login.required'=>'必须输入用户名或者邮箱或者手机号',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在6到20位之间'
        ];
        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
            return redirect('home/login')
                ->withErrors($validator)
                ->withInput();
        }
        // 判断是否有此用户
        $user = HomeUser::where('tel',$phone['0'])->first();
          if(!$user){
              return redirect('home/login')->with('errors','用户名不存在');
          }
          //判断密码是否正确
          $str = $input['password'];
          if( Hash::check("$str", $user->password)){
            Session::put('user',$user);
            return redirect('home/index');
            
         }
         return redirect('home/login')->with('errors','密码不正确');
         }
        }else if(preg_match_all('/[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,4}/', $str, $email)){
             if(!empty($email)){
        $rule = [
            'login'=>'required|email',
            "password"=>'required|between:6,20'
        ];
        $mess = [
            'login.required'=>'请正确输入邮箱',
            'login.email' => '邮箱格式不正确',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在6到20位之间'
        ];
        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
            return redirect('home/login')
                ->withErrors($validator)
                ->withInput();
        }
        // 判断是否有此用户
        $user = HomeUser::where('email',$email)->first();
          if(!$user){
              return redirect('home/login')->with('errors','用户名不存在');
          }
          //判断密码是否正确
          $str = $input['password'];
          if( Hash::check("$str", $user->password)){
            Session::put('user',$user);
            return redirect('home/index');
         }
         return redirect('home/login')->with('errors','密码不正确');
        }
      }else if(preg_match_all('/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u', $str, $uname)){
         if(!empty($uname)){
        $rule = [
            'login'=>'required',
            "password"=>'required|between:6,20'
        ];
        $mess = [
            'login.required'=>'必须输入用户名或邮箱或手机号',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在6到20位之间'
        ];
        $validator =  Validator::make($input,$rule,$mess);
        if ($validator->fails()) {
            return redirect('home/login')
                ->withErrors($validator)
                ->withInput();
        }
        // 判断是否有此用户
        $user = HomeUser::where('uname',$uname)->first();
          if(!$user){
              return redirect('home/login')->with('errors','用户名不存在');
          }
          //判断密码是否正确
          $str = $input['password'];
          if( Hash::check("$str", $user->password)){
            Session::put('user',$user);
            return redirect('home/index');
         }
         return redirect('home/login')->with('errors','密码不正确');
         }
           
        }
     
    }
  }
