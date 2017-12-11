<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Cate;
use App\Http\Models\good;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Good_ListController extends Controller
{
    /**
     * 获取所有商品进行展示
     *
     * 返回说有的商品
     */
    public function index(Request $request, $id = '')
    {
        $gname = $request->input('gname');
        $tid = $request->input('cate');
        $id = empty($id) ? $tid : $id;
        $cate = Cate::where('cate_id', $id)->first();
        return view('Home.Home_List.Good_List', compact('id', 'gname', 'cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        $tid = $request->input('tid');
        $tid = empty($tid) ? '' : $tid;
        $gname = $request->input('gname');
        $gname = empty($gname) ? '' : $gname;
        $data = good::orderBy('focus', 'desc','gpic')->where('tid', 'like', '%' . "$tid" . '%')->where('gname', 'like', '%' . "$gname" . '%')->with('gpicinfo', 'fishpond', 'Cate')->paginate(8);
        return $data;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $input = good::where('gid', $id)
            ->with('gpicinfo', 'fishpond', 'Cate')->first();
//        dd($input);
        return view('Home.Home_List.Good_det',compact('input'));
    }

}
