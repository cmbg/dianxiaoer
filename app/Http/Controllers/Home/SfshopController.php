<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Fishpond;
use App\Http\Models\Fshop;
use App\Http\Models\good;
use App\Services\OSS;
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
        $peo = Fishpond::where('uid',$uid)->get()->toArray();
        if(!empty($peo)){
            return back()->with('info','您已经创建了鱼塘,请直接去我的鱼塘查看信息......');
        }
        $this->validate($request, [
            'fishpondname' => 'required|unique:fishpond',
            'imgfile'=> 'required',
        ], ['fishpondname.required' => '鱼塘名称必须填写',
            'fishpondname.unique' => '该鱼塘名称已经存在,耐心换一个鱼塘名试试...',
            'imgfile.required' => '鱼塘头像必须选择一张图片',
        ]);
        $data = $request->except('_token','limg');
//        dd($data);
        $data['uid'] = $uid;
        $data['status'] = 0;
        $fishpond = Fishpond::create($data);
        $res = $fishpond->save();
        if ($res) {
            return redirect('/home/fshop')->with('info','鱼塘创建成功,请在鱼塘中管理你的商品...');
        } else {
            return back()->with('info','创建鱼塘失败,换个鱼塘名称试试...');
        }
    }


    /**
     * 处理客户端鱼塘传过来的图片
     *
     */
    public function imgfile(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
        if ($file->isValid()) {
            // 获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();
            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = 'sfshop_' . time() . rand(1000, 9999) . uniqid() . '.' . $ext;
            // 获取图片在临时文件中的地址
            $pic = $file->getRealPath();
            //将文件移动到阿里OSS
            OSS::upload($newfile, $pic);
            //将上传的图片名称返回到添加，目的是显示图片
            return config('app.picurl') . '/' . $newfile;
        }
    }


    /**
     * 获取鱼塘的所有商品进行展示
     *
     * 返回鱼塘中所有的商品
     */
    public function goods(Request $request,$id)
    {
//        $gname = $request->input('gname');
//        $tid = $request->input('cate');
//        $id = empty($id) ? $tid : $id;
//        $cate = Cate::where('cate_id', $id)->first();
        return view('Home.Home_Sfshop.Sfshopgood', compact('id'));
    }

    /**
     * 瀑布流执行ajax获取商品
     *
     *
     */
    public function ajax(Request $request)
    {
//        return 1111;
//        $tid = $request->input('tid');
//        $tid = empty($tid) ? '' : $tid;
//        $gname = $request->input('gname');
//        $gname = empty($gname) ? '' : $gname;
        $data = good::orderBy('focus', 'desc')->where('fid', 1)->with('gpicinfo', 'fishpond', 'Cate')->paginate(8);
//        $data = good::orderBy('focus', 'desc')->where('fid', 1)->where('gname', 'like', '%' . $gname . '%')->with('gpicinfo', 'fishpond', 'Cate')->paginate(8);
//        dd($data);
        return $data;
    }
}
