<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Order;
use App\Http\Models\OrderDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MyOrderController extends CommonController
{
    //显示订单列表页面
    public function myorder(Request $request,$id = '')
    {
        $uid = session()->get('user')->uid;
        $oid = $request->input('oid');
//        $data = Order::with('goods')->get();
//        dd($oid);

        $res1 = DB::table('order')->where(function($query) use($uid){
            $query->where('order.uid',$uid);
            $query->where('order.status',1);
        }) -> count();
        $res2 = DB::table('order')->where(function($query) use($uid){
            $query->where('order.uid',$uid);
            $query->where('order.status',2);
        }) -> count();
        $res3 = DB::table('order')->where(function($query) use($uid){
            $query->where('order.uid',$uid);
            $query->where('order.status',3);
        }) -> count();
        $data = DB::table('order')->where(function($query) use($id,$uid,$oid){
            $query->where('order.uid',$uid);
            if(!empty($id)) {
                $query->where('order.status',$id);
            }
            if(!empty($oid)) {
                $query->where('order.oid','like','%'.$oid.'%');
            }
        })  ->join('orderdetail', 'order.oid', '=', 'orderdetail.oid')
            ->join('goods', 'orderdetail.gid', '=', 'goods.gid')
//            ->select('order.oid','order.oprice','order.status', 'orderdetail.bprice','orderdetail.bcnt', 'goods.pic')
            ->get();
//        dd($data);
//        first();一个函数,判断集合是不是为空
        if(!empty($data)) {
            foreach ($data as $k => $v) {
                $order[$v->oid][] = $v;
            }
        }else{
            $order = [];
        }
//        dd($order);
        $title = '我的订单';
        return view('Home.Home_order.myorder',compact('title','order','res1','res2','res3','request'));
    }

    //确认收货,修改收货状态,改为已收货,完成交易
    public function status(Request $request)
    {
        $oid = $request->input('oid');
        $res = Order::where('oid',$oid)->update(['status' => 3]);
        return $res;
    }

    //删除一个订单
    public function delete(Request $request)
    {
        $oid = $request->input('oid');
        $res = Order::where('oid',$oid)->delete();
        $ress = OrderDetail::where('oid',$oid)->delete();

        $data = [];
        if($res&&$ress){
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
