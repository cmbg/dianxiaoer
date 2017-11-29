<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;
class TclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $tclass = DB::table('tclass')->get();
//        dd($tclass);
        $res = DB::table('tclass')->
        select(DB::raw("*,concat(path,',',tid) as paths"))->
        orderBy('paths')->

        where('tname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',5));
        $search =Input::get('search');
        dd($res);
        foreach($res as $k => $v){

            //用逗号拆分path    explode字符串拆分成数组
            $data = explode(',',$v->path);

            $count = count($data);

            $v->tname = str_repeat('|--', $count).$v->tname;
        }
        return view('admin.type.list',compact('res','request','search'));
    }
    /*
     //商品添加页
     * */
    public function create()
    {
        //找出数据库中的一级分类
        //$pid_o= Type::where('pid',0)->get();
        $res = DB::table('')->
        select(DB::raw("*,concat(path,',',tid) as paths"))->
        orderBy('paths')->
        get();
        foreach($res as $k=>$v){
            $data = explode(',',$v->path);
            $count = count($data);
            $v->tname = str_repeat('|--',$count).$v->tname;
        }
        return view('admin/type/add',compact('res'));
    }

    /**
     * 添加分类  拼接路径.
     *孙小楠
     * 08 09
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        if($input['pid'] == '0'){
            $input['path'] = '0';
        } else{
            $info = Type::where('tid',$input['pid'])->first();
            $input['path'] = $info['pid'].','.$info['tid'];
        }
        $res = Type::create($input);
        if($res){
            return redirect('admin/type');
        }else{
            return back()->with('error','添加失败！');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取要修改的类
        $cate = Type::find($id);
        $res = DB::table('tclass')->
        select(DB::raw("*,concat(path,',',tid) as paths"))->
        orderBy('paths')->
        get();
        return view('admin.type.edit',compact('cate','res'));
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
        $input = $request->except('_token','_method');
        $cate = Type::find($id);
        $data = $cate->update($input);
        if($data){
            return redirect('admin/type');
        } else{
            return back()->with('error','修改失败！');
        }
    }

    /**
     * 商品分类删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查询要删除的类
        $cate = Type::find($id);
        //判断是否有二级分类，如果有二级分类则无法删除
        $count = Type::where('pid',$id)->count();
        if($cate->pid == '0' && $count){
            $data = [
                'status'=>0,
                'msg'=>'请先删除子类'
            ];
            return $data;
        }
        $re = $cate->delete();
        if($re){
            $data = [
                'status'=>1,
                'msg'=>'删除成功！'
            ];
        } else {
            $data = [
                'status'=>2,
                'msg'=>'删除失败!'
            ];
        }
        return $data;
    }
}



