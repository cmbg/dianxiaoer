<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Nav;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NavController extends Controller
{
    /**
     * 查看广告列表页面
     *
     * @return /admin/ad
     */
    public function index(Request $request)
    {
        $data1 = Nav::orderby('paixu','asc')
            ->where(function($query) use($request){
                //检测关键字
                $lname = $request->input('nname');
                $query->where('nname','like','%'.$lname.'%');

            })
            ->paginate($request->input('num', 5));
//        dd($data);
        return view('Admin.Admin_Nav.index', ['title' => '导航栏显示','data1'=>$data1,'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '显示添加页面';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nname' => 'required',
            'nlink' => 'required',
        ], ['nname.required' => '名字必须填写',
            'nlink.required' => '目标地址必须填写',
        ]);
        $data = $request->except('_token');
        $adver = Nav::create($data);
        $res = $adver->save();
        if ($res) {
            return redirect('/admin/nav')->with('info','添加成功');
        } else {
            return back()->with('info','添加失败');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Nav::find($id);
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
