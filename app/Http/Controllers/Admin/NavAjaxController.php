<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Nav;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NavAjaxController extends Controller
{
    public function ajaxName(Request $request)
    {
//        return 111;
//        sleep(2);
        $id = $request->input('id');
        $name = $request->input('name');
        $res = Nav::where('nname', $name)->first();
//        return $res;
        if ($res) {
////            用户名已经存在 。
            return response()->json(['code' => 0]);
////            return ['code'=>0];
        } else {
            $data = Nav::find($id);
            $res = $data->update(['nname' => $name]);
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

    public function ajaxLinks(Request $request)
    {
//        return 111;
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
