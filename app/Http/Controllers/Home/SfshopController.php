<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Fishpond;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SfshopController extends CommonController
{
    /**
     * 引入申请开通鱼塘页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uname = session()->get('user')->uname;
        return view('Home.Home_Sfshop.Index',['title'=>'开通鱼塘','uname'=>$uname]);
    }

    /**
     * 执行开通鱼塘,成功后跳转到鱼塘列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $uid = session()->get('user')->uid;
        $peo = Fishpond::where('uid',$uid)->get();
        if($peo){
            return back()->with('info','您已经创建了鱼塘,请直接去我的鱼塘查看信息......');
        }
        $this->validate($request, [
            'fishpondname' => 'required|unique:fishpond',
        ], ['fishpondname.required' => '鱼塘名称必须填写',
            'fishpondname.unique' => '该鱼塘名称已经存在,耐心换一个鱼塘名试试...',
        ]);
        $data = $request->except('_token');
        $data['uid'] = $uid;
        $data['status'] = 1;
        $fishpond = Fishpond::create($data);
        $res = $fishpond->save();
        if ($res) {
            return redirect('/home/fshop');
        } else {
            return back()->with('info','创建鱼塘失败,换个鱼塘名称试试...');
        }
    }


}
