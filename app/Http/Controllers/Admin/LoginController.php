<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\AdminUser;
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

class LoginController extends Controller
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
        return view('Admin/Admin_Login/login');
    }

    public function yzm()
    {
        $code = new Code();
        $code->make();
    }

    // 验证码生成
    public function captcha($tmp)
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }


    public function  dologin(Request $request)
    {
        $input = $request->except('_token');
        
//
//        dd($code);
        
//        dd($input);
        $rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            "password"=>'required|between:3,20',
            'code'=>"required"
        ];
        $mess = [
            'uname.required'=>'必须输入用户名',
            'uname.regex'=>'用户名必须是汉字字母下划线',
            'uname.between'=>'用户名必须在5到20位之间',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码必须在5到20位之间',
            'code.required'=>'必须输入验证码'
//            'code.integer'=>'验证码错误'

        ];
        //判断输入的验证码和原来系统生成的验证比较 strtolower 把内容全部转为小写

        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        // 验证验证码是否正确
       if( $input['code'] !=  Session::get('code')) {
           return redirect('admin/login')->with('errors','验证码错误');
          }

        // 判断是否有此用户
        $user = AdminUser::where('uname',$input['uname'])->first();
          //dd($user);
          if(!$user){
              return redirect('admin/login')->with('errors','用户名不存在');
          }
          // dd($user);
          //判断密码是否正确
          // Hash::check("trim($input['password'])", $user->password)
          $str = trim($input['password']);

          if( Hash::check("$str", $user->password) != $input['password']){
             return redirect('admin/login')->with('errors','密码不正确');
         }
                   // dd(111);

         Session::put('user',$user);
         // return " 11111";
         return redirect('admin/adminuser');
    }
  
}
