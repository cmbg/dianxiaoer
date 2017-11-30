<?php

namespace App\Http\Controllers\Home;
use App\Http\Models\Ad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = Ad::where('posit','1')->where('astatus','0')->paginate(3);
        $data2 = Ad::where('posit','2')->where('astatus','0')->paginate(1);
        $data3 = Ad::where('posit','3')->where('astatus','0')->paginate(1);
        $data4 = Ad::where('posit','4')->where('astatus','0')->paginate(1);
        $data5 = Ad::where('posit','5')->where('astatus','0')->paginate(1);

//        return view('Home.Index.index',['data1' => $data1]);
        return view('Home.Index.index',compact('data1','data2','data3','data4','data5'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
