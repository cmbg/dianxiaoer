<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Fshop;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FshopController extends Controller
{
    /**
     * 查看鱼塘列表页面
     *
     * @return /admin/fshop
     */
    public function index()
    {
        $data = Fshop::orderby('id','asc')->paginate(3);
        dd($data);
//        return view('Admin.Admin_Fshop.index', ['title' => '鱼塘显示','data1'=>$data1]);
        return view('Admin.Admin_Fshop.index', ['title' => '鱼塘显示']);
    }

    /**
     * 鱼塘添加页面
     *
     * @return /admin/ad/create
     */
    public function create()
    {
        return view('Admin.Admin_Fshop.Create', ['title' => '鱼塘添加']);
    }

    /**
     * 执行鱼塘添加
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
            'apic' => 'required|image',
            'posit'=> 'required'
        ], ['acustomer.required' => '客户信息必须填写',
            'atitle.required' => '鱼塘标题必须填写',
            'aurl.required' => '跳转地址必须填写',
            'apic.required' => '图片必须上传',
            'apic.image' => '请选择张图片才好',
            'posit.request' => '图片位置必须填写',
        ]);

        $data = $request->except('_token');

//        $data['remember_token'] = str_random(50);
//        $time = date('Y-m-d H:i:s');
//        $data['created_at'] = $time;
//        $data['updated_at'] = $time;

        if ($request->hasFile("apic")) {
            //获取上传信息
            $file = $request->file("apic");
            //确认上传的文件是否成功
            if ($file->isValid()) {
                //$picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
//                $filename = time() . rand(1000, 9999) . "." . $ext;
                $filename = str_random(32) . '.' . $ext;
                //执行移动上传文件
                $file->move("./uploads/", $filename);
                $data['apic'] = $filename;

                //图片压缩
                $img = Image::make("./uploads/" . $filename);
                //执行等比缩放
                $img->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save("./uploads/s_" . $filename);//保存

            }
        } else {
            $data['apic'] = 'default.jpg';
        }

        $adver = Ad::create($data);
        $res = $adver->save();
        if ($res) {
            return '插入成功';
//            return redirect('/admin/ad');
        } else {
//            return back();
            return '插入失败';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 显示编辑鱼塘
     *
     * @param  int  $id
     * @return /admin/ad/{$id}/edit
     */
    public function edit($id)
    {
        $data = Ad::find($id);
        return view('Admin.Admin_Ad.Edit', ['title' => '鱼塘编辑','data'=>$data]);
    }

    /**
     * 执行更新鱼塘操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return '执行update';
        $data = $request->except('_token','_method','adv_id');
        $id = $request->input('adv_id');
        $res = Ad::find($id);
        $r = $res->update($data);
        if ($r) {
            return redirect( url('admin/ad') )->with(['info' => '更新成功']);
        } else {
            return back()->with(['info' => '更新失败']);
        }

    }

    /**
     * 删除一个鱼塘.
     *
     * @param  int  $id
     * @return /admin/fshop/id
     */
    public function destroy($id)
    {
//        return '执行删除';
        $data = Ad::find($id);
        $res = $data->delete();
        if ($res) {
            return redirect('/admin/user/index')->with(['info' => '删除成功']);
        } else {
            return back()->with(['info' => '删除失败']);
        }
    }

}
