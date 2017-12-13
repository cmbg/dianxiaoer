<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Nav;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NavAjaxController extends CommonController
{
    public function ajaxName(Request $request)
    {
//        return 111;
//        sleep(2);
        $id1 = $request->input('id1');
//        return $id1;
        $name1 = $request->input('name1');
        $res1 = Nav::where('nname', $name1)->first();
//        return $res;
        if ($res1) {
////            用户名已经存在 。
            return response()->json(['code' => 0]);
////            return ['code'=>0];
        } else {
//            return 111;
            $data = Nav::find($id1);
            $res1 = $data->update(['nname' => $name1]);
//            echo $res;
            if ($res1) {
//////                1.表示成功。
                return response()->json(['code' => 1]);
            } else {
//////                2.表示失败。
                return response()->json(['code' => 2]);
            }
        }
    }

    public function ajaxLinks(Request $request)
    {
        //return 111;
//        sleep(2);
        $id = $request->input('id');
        $name = $request->input('name');
        $res = Nav::where('nlink', $name)->first();
        if ($res) {
////            用户名已经存在 。
            return response()->json(['code' => 0]);
////            return ['code'=>0];
        } else {
            $data = Nav::find($id);
            $res = $data->update(['nlink' => $name]);
//            echo $res;
            if ($res) {
//////                1.表示成功。
                return response()->json(['code' => 1]);
            } else {
//////                2.表示失败。
                return response()->json(['code' => 2]);
            }
        }
    }

    public function ajaxPaixu(Request $request)
    {
        $id = $request->input('id');
        $paixu = $request->input('name');
            $data = Nav::find($id);
            $res = $data->update(['paixu' => $paixu]);
            if ($res) {
//                1.表示成功。
                return response()->json(['code' => 1]);
            } else {
//                2.表示失败。
                return response()->json(['code' => 2]);
            }
    }

}
