<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Fishpond;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FishpondController extends CommonController
{
    /**
     * 管理员查看鱼塘的列表显示页面
     *
     * @return /admin/fshop
     */
    public function index(Request $request)
    {
        $uname = $request->input('uname');
//        $data1 = Fishpond::find(1)->adminuser()->where('uname','admin')->get();

//        $users = App\User::with(['posts' => function ($query) {
//            $query->where('title', 'like', '%first%');
//
//        }])->get();


        $data1 = Fishpond::with(['adminuser' => function ($query) use ($uname)  {
            $query->where('uname', 'like', '%'.$uname.'%');
        }])->orderby('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uid = $request->input('uid');
                $status= $request->input('status');
                $fishpondname = $request->input('fishpondname');
                $query->where('uid','like','%'.$uid.'%');
                $query->where('fishpondname','like','%'.$fishpondname.'%');
                if($status == 1 || $status ==="0"){
                    $query->where('status',$status);
                }
            })->paginate($request->input('num', 5));
//        dd($data1);
        return view('Admin.Admin_Fshop.Index', ['title' => '鱼塘显示','data1'=>$data1,'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('Admin.Admin_Fshop.Create', ['title' => '鱼塘添加']);
        return 49589345;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * 管理员在鱼塘列表页删除某一个鱼塘
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Fishpond::find($id);
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
