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
        
//
//        dd($code);
        
//        dd($input);
        $rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:4,20',
            "password"=>'required|between:3,20'
          
        ];
        $mess = [
            'uname.required'=>'必须输入用户名',
            'uname.regex'=>'用户名必须是汉字字母下划线',
            'uname.between'=>'用户名必须在5到20位之间',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在3到20位之间'
          
//            'code.integer'=>'验证码错误'

        ];
        //判断输入的验证码和原来系统生成的验证比较 strtolower 把内容全部转为小写

        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('home/login')
                ->withErrors($validator)
                ->withInput();
        }
  

        // 判断是否有此用户
        $user = HomeUser::where('uname',$input['uname'])->first();
          //dd($user);
          if(!$user){
              return redirect('home/login')->with('errors','用户名不存在');
          }
          // dd($user);
          //判断密码是否正确
          // Hash::check("trim($input['password'])", $user->password)
          $str = $input['password'];
          // $hash = Hash::make($str);
          if( Hash::check("$str", $user->password)){
            // dd( $str);
            Session::put('user',$user);
            return redirect('home/my_account');
            
         }
         return redirect('home/login')->with('errors','密码不正确');

     
    }
    public function register()
    {
        return view('Home/Home_Login/register');
    }
    public function doregister(Request $request)
    {
        $input = $request->except('_token');
        $rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            "password"=>'required|between:5,20',
            're_password' => 'same:password'
        ];
        $mess = [
            'uname.required'=>'必须输入用户名',
            'uname.regex'=>'用户名必须是汉字字母下划线',
            'uname.between'=>'用户名必须在5到20位之间',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在5到20位之间',
            're_password.same' => '两次密码必须一致'
//            'code.integer'=>'验证码错误'

        ];
        //判断输入的验证码和原来系统生成的验证比较 strtolower 把内容全部转为小写

        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('home/register')
                ->withErrors($validator)
                ->withInput();
        }

        // 判断是否有此用户
        $user = HomeUser::where('uname',$input['uname'])->first();
          //dd($user);
          if($user){
              return redirect('home/register')->with('errors','用户名已存在');
          }

          // dd($user);

        //        3. 执行添加操作
         $user = new HomeUser();
         $user->uname = $input['uname'];
         // die ($input['password']);
         $user->password = Hash::make($input['password']);
        // die($user->password);
         // $user->avatar = $input['avatar'];
         $res = $user->save();
          if($res){
            return redirect('home/login')->with('msg','注册成功');
             }else{
            return redirect('home/register')->with('msg','注册失败');
            }
    }   
}
