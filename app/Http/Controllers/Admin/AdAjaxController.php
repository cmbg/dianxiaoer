<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Ad;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdAjaxController extends Controller
{
    /**
     * 修改广告的状态
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxStatus(Request $request)
    {

        $id = $request->input('id');
        $data = Ad::find($id);
        if ($data->astatus == 0) {
            $data->update(['astatus' => 1]);
            $res = $data->save();
//            echo $res;
            if ($res) {
                return ['astatus'=>1];
//////                return response()->json(['astatus' => 1]);
////                return json_encode(['astatus' => 1]);
            } else {
                return ['astatus'=>0];
//////                return response()->json(['astatus' => 0]);
////                return json_encode(['astatus' => 0]);
            }
        } else {
            $data->update(['astatus' => 0]);
            $res = $data->save();
//            echo $res;
            if ($res) {
                return ['astatus'=>0];
//////                return response()->json(['astatus' => 0]);
////                return json_encode(['astatus' => 0]);
            } else {
                return ['astatus'=>1];
//////                return response()->json(['astatus' => 1]);
////                return json_encode(['astatus' => 1]);
            }
        }
    }

    /**
     * 修改广告客户信息
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxName(Request $request)
    {
//        return 111;
//        sleep(2);
        $id = $request->input('id');
        $name = $request->input('name');
        $res = Ad::where('acustomer', $name)->first();
        if ($res) {
////            用户名已经存在 。
            return response()->json(['code' => 0]);
////            return ['code'=>0];
        } else {
            $data = Ad::find($id);
            $res = $data->update(['acustomer' => $name]);
//            echo $res;
            if ($res) {
//                1.表示成功。
                return response()->json(['code' => 1]);
            } else {
//                2.表示失败。
                return response()->json(['code' => 2]);
            }
        }
    }


}
