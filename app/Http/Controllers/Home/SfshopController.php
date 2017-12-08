<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SfshopController extends Controller
{
    /**
     * 引入申请开通鱼塘页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home.Home_Sfshop.Index',['title'=>'开通鱼塘']);
    }

    /**
     * 执行开通鱼塘,成功后跳转到鱼塘列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
//        return 111;
        $res = $request->exect();
        return $res;
//        return redirect'/home/fshop');
    }


}
