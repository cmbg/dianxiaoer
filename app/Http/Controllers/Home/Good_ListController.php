<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Cate;
use App\Http\Models\Comment;
use App\Http\Models\good;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Good_ListController extends CommonController
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
        $data = good::orderBy('focus', 'desc', 'gpic')->where('tid', 'like', '%' . "$tid" . '%')->where('gname', 'like', '%' . "$gname" . '%')->with('gpicinfo', 'fishpond', 'Cate')->paginate(8);
        return $data;

    }

    /**
     * ajax返回~ 接受数据存入数据库
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['msgDate'] = date('Y-m-d H:i:s');
//        $user = Session::get('user');
//        $data['uid'] = $user->uid;
        //======================================
        $data['uid'] = 1;//测试数据
        $data['pid'] = 0;//测试数据
        //-----------------------------------
        $res = Comment::create($data);
        if ($res) {
            return '添加成功';
        }
    }

    /**
     * @param Request $request
     * @return string
     */

    public function reply(Request $request)
    {
        $pid = $request->input('pid');
        $id = $request->input('id');
        $mpid = $request ->input('mpid');
        $gid = $request->input('id');
        $mid = $request->input('mid');
        $vpid = $request->input('vpid');


        if(!empty($mpid)){
            $data = $request->except('mpid','mid','pid','gid','id','vid');
            $data['msgDate'] = date('Y-m-d H:i:s');

            $data['path'] = $mpid;
            $data['pid'] = $mid;
            $data['gid'] = $gid;
            $res = Comment::create($data);

            if($res){
                return '添加成功';
            }
        }
        if (!empty($pid)) {
            $data = $request->except('vpid','pid', 'id','mpid','mid','gid');
            $data['msgDate'] = date('Y-m-d H:i:s');

            $data['path'] = $pid;
            $data['pid'] = $id;
            $data['gid'] = $gid;
            $res = Comment::create($data);

            if ($res) {
                return '添加成功';
            }
        }
        if(!empty($vpid)){
            $data = $request->except('vpid', 'id','pid','mpid','mid','gid');

            $data['pid'] = $vpid;
            $data['gid'] = $gid;
            $res = Comment::create($data);
            if ($res) {
                return '添加成功';
            }

        }


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
        $comment = Comment::where('gid',$id)->with('HomeUser','good')->get();
//        $comment = self:: toTree($comment,0);
//        dd($comment);
        return view('Home.Home_List.Good_det', compact('input', 'id', 'comment'));

    }
    public static function toTree($comment, $pid='0')
    {
        $replyBody = [];
        foreach($comment as  $k => $v){
            if($v->pid == $pid){
                $v->img= $v->HomeUser['avatar'];
                $v->replyName = $v->HomeUser['nickname'];
                $v->time = $v->msgDate;
                $v->replyBody = self::toTree($comment, $v->id);
                unset($v->HomeUser);
                unset($v->isAnonymity);
                unset($v->msgDate);
                $v -> path = explode(',',$v -> path) ;
                $replyBody[] = $v;

            }
        }
        return $replyBody;
    }

}
