<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Order;
use App\Http\Models\OrderDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * 查看订单列表页面
     *
     * @return /admin/ad
     */
    public function index(Request $request)
    {
//        dd($request->all());
//        $data = Order::with('adminuser')->paginate($request->input('num', 5));
        $data = Order::with('adminuser')->where(function ($query) use ($request) {
            //检测关键字
            $oid = $request->input('oid');
            $status = $request->input('status');
            $ictime = $request->input('ictime');
            $actime = $request->input('actime');
            $query->where('oid', 'like', '%' . $oid . '%');
//            $query->where('status',$status);
            $query->where('status', 'like', '%' . $status . '%');
//            $query->whereBetween('ontime', [0, 0]);
        })->paginate($request->input('num', 5));
//        dd($data);
//        dd($data[0]->oid);
//        dd($data[2]->adminuser->uname);
//        dd($data[2]->adminuser['uname']);
        return view('Admin.Admin_Order.Index', ['title' => '订单列表', 'data' => $data,'request'=> $request]);
    }

    /**
     * 发货处理
     *
     * @return \Illuminate\Http\Response
     */
    public function give($id)
    {
        $res = Order::where('oid', $id)->update(['status' => 2]);
        return redirect('/admin/order');
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
     * 显示商品详情
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OrderDetail::where('oid', $id)->with('good')->paginate(10);
//        foreach($data as $k=>$v) {
//                echo $v->good->gid;
//                echo '<br>';
//                echo $v->good->gname;
//                echo '<br>';
//                echo $v->good->pic;
//                echo '<br>';
//                echo $v->bprice;
//                echo '<br>';
//                echo $v->bcnt;
//        }
//        dd( $data[0]->good->tid);
        return view('Admin.Admin_Order.Show', ['title' => '订单详情', 'data' => $data]);
    }

    /**
     * 显示编辑页面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Order::where('oid', $id)->first();
        return view('Admin.Admin_Order.Edit', ['title' => '订单编辑', 'data' => $data]);
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'tel' => 'required',
            'add' => 'required',
        ], ['name.required' => '收货人必须填写',
            'tel.required' => '收货电话必须填写',
            'add.required' => '收货地址必须填写',
        ]);

        $data = $request->except('_token', '_method');
//        dd($data);
        $res = Order::where('oid', $id)->first();
        $r = $res->update($data);
        if ($r) {
            return redirect(url('admin/order'))->with('info', '更新成功');
        } else {
            return back()->with('info', '更新失败');
        }

    }

    /**
     * 删除一个订单
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//        public function destroy($id)
//    {
//        $res = \DB::table('order')->where('oid',$id)->delete();
////        $data = Order::where('oid',$id);
////        $res = $data->delete();
////        $res = $data->delete();
//        $data = [];
//        if($res){
//            $data['error'] = 0;
//            $data['msg'] ="删除成功";
//        }else{
//            $data['error'] = 1;
//            $data['msg'] ="删除失败";
//        }
////        return  json_encode($data);
//        return $data;
//    }
}
