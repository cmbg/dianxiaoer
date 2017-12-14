<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Links;
class LinksAjaxController extends CommonController
{
    public function ajaxName(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $res = Links::where('lname', $name)->first();
        if ($res) {
//            用户名已经存在 。
            return response()->json(['code' => 0]);
        } else {
            $data = Links::find($id);
            $res = $data->update(['lname' => $name]);
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
