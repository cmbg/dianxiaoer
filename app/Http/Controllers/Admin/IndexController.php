<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//            return 111;
        return view('Admin/Layouts/first',['title'=>'后台首页']);
//        return view('Admin/Admin_Index/index',['title'=>'后台首页']);
    }


}
