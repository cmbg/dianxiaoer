<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Ad;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\OSS;


class AdController extends Controller
{
    /**
     * 查看广告列表页面
     *
     * @return /admin/ad
     */
    public function index(Request $request)
    {
        $data1 = Ad::orderby('adv_id','asc')->where('posit',1)->paginate(5);
        $data2 = Ad::orderby('adv_id','asc')->where('posit',2)->paginate(5);
        $data3 = Ad::orderby('adv_id','asc')->where('posit',3)->paginate(5);
        $data4 = Ad::orderby('adv_id','asc')->where('posit',4)->paginate(5);
        $data5 = Ad::orderby('adv_id','asc')->where('posit',5)->paginate(5);
        $title = '广告显示';
        return view('Admin.Admin_Ad.Ad',compact('title','data1','data2','data3','data4','data5'));

    }

    /**
     * 显示广告添加页面
     *
     * @return /admin/ad/create
     */
    public function create()
    {
        return view('Admin.Admin_Ad.Add', ['title' => '广告添加']);
    }

    /**
     * 执行广告添加
     *
     * @param  post方式
     * @return /admin/ad
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'acustomer' => 'required',
            'atitle' => 'required',
            'aurl' => 'required',
            'posit'=> 'required',
            'apic'=>'required',
        ], ['acustomer.required' => '客户信息必须填写',
            'atitle.required' => '广告标题必须填写',
            'aurl.required' => '跳转地址必须填写',
            'posit.required' => '投放位置必须填写',
            'apic.required'=>'广告图片必须选择',
        ]);

        $data = $request->except('_token','apic');
        if ($request->hasFile("apic")) {
            //获取上传信息
            $file = $request->file("apic");
            //确认上传的文件是否成功
            if ($file->isValid()) {
                // 获取图片在临时文件中的地址
                $pic = $file->getRealPath();
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                $filename = 'ad_'.time() . rand(1000, 9999) . "." . $ext;
                //执行移动上传文件
                $result = OSS::upload($filename, $pic);
                $data['apic'] = config('app.picurl').'/'.$filename;
            }
        } else {
            $data['apic'] = config('app.picurl').'/addefault.jpg';
        }
        $data['atime'] = date('y-m-d h:i:s',time());
        $adver = Ad::create($data);
        $res = $adver->save();
        if ($res) {
            return redirect('/admin/ad')->with('info','添加成功');
        } else {
            return back()->with('info','添加失败');
        }
    }

    /**
     * 显示编辑页面
     *
     * @param  int  $id
     * @return /admin/ad/{$id}/edit
     */
    public function edit($id)
    {
//        return 'adcontroller';
        $data = Ad::find($id);
        return view('Admin.Admin_Ad.Edit', ['title' => '广告编辑','data'=>$data]);
    }

    /**
     * 执行编辑更新广告操作
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'acustomer' => 'required',
            'atitle' => 'required',
            'aurl' => 'required',
            'posit'=> 'required',
        ], ['acustomer.required' => '客户信息必须填写',
            'atitle.required' => '广告标题必须填写',
            'aurl.required' => '跳转地址必须填写',
            'posit.required' => '投放位置必须填写',
        ]);
        $data = $request->except('_token','_method');
        if ($request->hasFile("apic")) {
            //获取上传信息
            $file = $request->file("apic");
            //确认上传的文件是否成功
            if ($file->isValid()) {
                // 获取图片在临时文件中的地址
                $pic = $file->getRealPath();
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                $filename = 'ad_'.time() . rand(1000, 9999) . "." . $ext;
                //执行移动上传文件
                $result = OSS::upload($filename, $pic);
                $data['apic'] = config('app.picurl').'/'.$filename;
            }
        }

        $res = Ad::find($id)->update($data);
        if ($res) {
            return redirect( url('admin/ad') )->with('info','更新成功');
        } else {
            return back()->with('info','更新失败');
        }
    }


    /**
     * 删除一个广告.
     *
     * @param  int  $id
     * @return /admin/ad/id
     */
    public function destroy($id)
    {
        $data = Ad::find($id);
        $res = $data->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }
//        return  json_encode($data);
        return $data;
    }
}