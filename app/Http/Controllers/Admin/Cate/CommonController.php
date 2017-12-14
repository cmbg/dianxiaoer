<?php

namespace App\Http\Controllers\Admin\Cate;

use Illuminate\Http\Request;
use App\Http\Models\AdminUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
         $uid = session()->get('user')->uid;
        
          $adminuser = AdminUser::where('uid',$uid)->first();
          $uname = $adminuser['uname'];
          $avatar = $adminuser['avatar'];
          view()->share('avatar',$avatar);
          view()->share('uname',$uname);
          // dd($avatar);
    }

}
