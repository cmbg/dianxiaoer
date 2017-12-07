<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Models\HomeUser;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    public function my_address()
    {
        // return (1111);
      return  view('Home/Home_User/my_address');
    }
    /**
     * [dopassword description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function dopassword(Request $request)
    {
         $input = Input::except('_token','save_account_details');
         // 2. 表单验证
        $rule = [
            "old_password"=>'required|between:6,20',
            "new_password"=>'required|between:6,20',
            're_password' => 'same:new_password',  
        ];

        $mess = [
            'new_password.required'=>'新密码必须输入',
            'new_password.between'=>'密码必须在6到20位之间',
            'old_password.required'=>'登录密码必须输入',
            'old_password.between'=>'密码必须在6到20位之间',
            're_password.same'=>'两次密码输入不一致',
        ];

        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('home/my_password')
                ->withErrors($validator)
                ->withInput();
        }

        // return 11111;
        
         $old_password = $input['old_password'];
         // return $old_password;
        
          // $hash = Hash::make($old_password);
          // return $hash;
          $password = session()->get('user')->password;
         // return $password;
         // $user = HomeUser::find($password);
         // dd(Hash::check("$old_password", $password));
          if(!Hash::check("$old_password", $password)){
             return redirect('home/my_password')->with('errors','登录密码不正确');
         }
         // return 1111;
         $new_password = $input['new_password'];
         $hash = Hash::make($new_password);

          $uid = session()->get('user')->uid;
         // return $uid;
         $user = HomeUser::find($uid);
         $res = $user->update(['password' => $hash]);
         // dd( $res);
//        4. 判断是否添加成功
       // $b = session()->all();
            // return ($b);
        if($res){
            // session()->push('user.password', $user);
               
               session()->flush();
                // $a = session()->all();
                // dd($a);
            return redirect('home/login');
        }else{
            return redirect('home/my_account')->with('msg','添加失败');
        }
    }
    
    /**
     * [password description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function password()
    {
      return view('Home/Home_User/my_password');
    }


    /**
     * [upload description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
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
    

    public function index()
    {
      
        return view('Home/Home_User/my_account');
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
         $input = Input::except('_token');
          $input = $request->except('_token','_method','file_upload','save_account_details');
          // return $input;
         // $users =  $request->session()->get('user');
         // $uid = $users->uid;
         // return $uid;
         // $user = HomeUser::find($uid);
         // return $user;
          // $user = new HomeUser();
         // $user->nickname = $input['nickname'];
     
         // $user->email = $input['email'];
         // $user->tel = $input['tel'];
         // $user->sex = $input['sex'];
         // $user->avatar = $input['avatar'];
         
         // $uid = $_SESSION['user']->uid;
         $uid = session()->get('user')->uid;
         // return $uid;
         $user = HomeUser::find($uid);
         $res = $user->update($input);

//        4. 判断是否添加成功
        if($res){
            Session::put('user',$user);
            // $a = session()->all();
            //     dd($a);
            return redirect('home/my_account')->with('msg','添加成功');
        }else{
            return redirect('home/my_account')->with('msg','添加失败');
        }
    }
}
