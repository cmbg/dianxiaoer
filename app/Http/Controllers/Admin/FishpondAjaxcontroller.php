<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Fishpond;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FishpondAjaxcontroller extends Controller
{
    /**
     * ajax修改修改鱼塘的状态,启用还是禁用
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxStatus(Request $request)
    {

        $id = $request->input('id');
        $data = Fishpond::find($id);
        if ($data->status == 0) {
            $res = $data->update(['status' => 1]);
            if ($res) {
                return ['status'=>1];
            } else {
                return ['status'=>0];
            }
        } else {
            $res = $data->update(['status' => 0]);
            if ($res) {
                return ['status'=>0];
            } else {
                return ['status'=>1];
            }
        }
    }

    /**
     * ajax修改鱼塘的名字
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxName(Request $request)
    {
//        return 111;
//        sleep(2);
        $id = $request->input('id');
        $name = $request->input('name');
        $res = Fishpond::where('fishpondname', $name)->first();
        if ($res) {
//            用户名已经存在
            return response()->json(['code' => 0]);
        } else {
            $data = Fishpond::find($id);
            $res = $data->update(['fishpondname' => $name]);
            if ($res) {
//                1.表示成功
                return response()->json(['code' => 1]);
            } else {
//                2.表示失败
                return response()->json(['code' => 2]);
            }
        }
    }

}
