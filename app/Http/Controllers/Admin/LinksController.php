<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends CommonController
{
    /**
     * 查看友情链接列表页面
     *
     * @return /admin/ad
     */
    public function index(Request $request)
    {
        $data1 = Links::orderby('lid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $lname = $request->input('lname');
                    $query->where('lname','like','%'.$lname.'%');

            })
            ->paginate($request->input('num', 5));
        return view('Admin.Admin_Links.Index', ['title' => '友情链接','data1'=>$data1,'request'=> $request]);
    }

    /**
     * 显示添加友情链接页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Admin_Links.Add', ['title' => '添加友情链接']);
    }

    /**
     * 执行友情链接的添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lname' => 'required',
            'lurl' => 'required',
            'art_thumb'=> 'required',
        ], ['lname.required' => '链接名称必须填写',
            'lurl.required' => '跳转地址必须填写',
            'art_thumb.required' => '链接图标必须选择一张图片',
        ]);
        $data = $request->except('_token','limg','art_thumb');
        $data['limg'] = $request->input('art_thumb');
//        dd($data);
        $adver = Links::create($data);
        $res = $adver->save();
        if ($res) {
            return redirect('/admin/links')->with('info','添加成功');
        } else {
            return back()->with('info','添加失败');
        }
    }

    /**
     * 显示友情链接的修改编辑页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        return 111;
        $data = Links::find($id);
        return view('Admin.Admin_Links.Edit', ['title' => '广告编辑','data'=>$data]);
    }

    /**
     * 执行修改
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return '执行编辑';
        $this->validate($request, [
            'lname' => 'required',
            'lurl' => 'required',
            'art_thumb'=> 'required',
        ], ['lname.required' => '链接名称必须填写',
            'lurl.required' => '跳转地址必须填写',
            'art_thumb.required' => '链接图标必须选择一张图片',
        ]);
        $data = $request->except('_token','limg','art_thumb');
        $data['limg'] = $request->input('art_thumb');
//        dd($data);
        $res = Links::find($id)->update($data);
        if ($res) {
            return redirect('/admin/links')->with('info','更新成功');
        } else {
            return back()->with('info','更新失败');
        }
    }

    /**
     * 删除一个友情链接
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Links::find($id);
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
